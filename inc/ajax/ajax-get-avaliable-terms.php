<?php
add_action('init', 'return_terms_html_init');

function return_terms_html_init()
{
    add_action('wp_ajax_nopriv_terms_html', 'return_terms_html');
    add_action('wp_ajax_terms_html', 'return_terms_html');
}

function return_terms_html()
{
    $html = terms_html();
    echo $html;
    wp_die();
}


function terms_html()
{
    ob_start();
    // FUNCTION MARKUP START
    $page = isset($_POST['page']) && !empty($_POST['page']) ? intval($_POST['page']) : 1;
    $per_page = isset($_POST['number']) && !empty($_POST['number']) ? intval($_POST['number']) : 1;
    $offset = ($page - 1) * $per_page;
    $course_id = isset($_POST['course']) && !empty($_POST['course']) ? intval($_POST['course']) : null;
    // For Pagination
    $dividers = get_terms(array(
        "taxonomy" => "terms_dividers",
        "hide_empty" => false,
        "meta_query" => array(
            array(
                "key" => "first_day_of_month",
                "value" => date("Ymd"),
                "compare" => ">",
            ),
        ),
        "order" => "DESC",
    ));
    $months_count = count($dividers);
    // For Current
    $div_current_args = array(
        "taxonomy" => "terms_dividers",
        "hide_empty" => false,
        "meta_query" => array(
            array(
                "key" => "first_day_of_month",
                "value" => date("Ymd"),
                "compare" => ">",
            ),
        ),
        "order" => "DESC",
        "number" => $per_page,
        "offset" => $offset,
    );

    $dividers_current = get_terms($div_current_args);
?>

<div class="terms-wrapper">
    <div class="terms-header">
        <div class="terms-pagination">
            <?php if ($page > 1) : ?>
            <button class="terms-page terms-prev" data-page="<?php print($page - 1) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z" />
                </svg>
            </button>
            <?php else : ?>
            <button class="terms-page terms-prev disabled" data-page="null">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z" />
                </svg>
            </button>
            <?php endif; ?>
            <div class="terms-current-month">
                <?php echo $dividers_current[0]->name; ?>
            </div>
            <?php if ($page < $months_count) : ?>
            <button class="terms-page terms-next" data-page="<?php print($page + 1) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z" />
                </svg>
            </button>
            <?php else : ?>
            <button class="terms-page terms-next disabled" data-page="null">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z" />
                </svg>
            </button>
            <?php endif; ?>
        </div>

    </div>
    <?php foreach ($dividers_current as $month) : ?>
    <div>
        <?php
                $today = date("Y-m-d H:i:s");
                $tomorrow = date("Y-m-d H:i:s", strtotime($today . '+1 day'));
                $termins_args = array(
                    "post_type" => "terms",
                    "tax_query" => array(
                        array(
                            "taxonomy" => "terms_dividers",
                            "field" => "slug",
                            "terms" => $month->slug,
                        ),
                    ),
                    "meta_query" => array(
                        array(
                            "key" => "term_date",
                            "value" => $tomorrow,
                            "compare" => ">",
                        ),
                    ),
                    'meta_key' => 'term_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                );
                if ($course_id) {
                    array_push($termins_args["meta_query"], array(
                        "key" => "term_course",
                        "value" => $course_id,
                        "compare" => "=",
                    ));
                }
                $termins = new WP_Query($termins_args);
                if ($termins->have_posts()) :
                    $day = null;
                ?>
        <div class="terms-items">
            <?php while ($termins->have_posts()) : $termins->the_post(); ?>

            <?php
                            // DAY SEPARATOR START
                            $time = strtotime(get_field("term_date"));
                            if ($day != date('Y-m-d', $time)) :
                                $day = date('Y-m-d', $time);
                            ?>
            <div class="terms-day">
                <?php
                                    $m_pol = array("", "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Lipiec", "Czerwiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");
                                    $d_pol = array("Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota");
                                    ?>
                <span><?php echo date('d', $time) . " " . $m_pol[intval(date('m', $time))] ?></span>
                <span><?php echo $d_pol[intval(date('w', $time))] ?></span>
            </div>
            <?php
                            endif;
                            // DAY SEPARATOR END
                            ?>
            <table class="terms-item-table">
                <tr>
                    <td>
                        <?php
                                        $term_count = get_term_singUps_count(get_the_id());
                                        $term_limit = intval(get_field("term_limit"));
                                        $term_dif = $term_limit - $term_count;
                                        $term_status = null;
                                        if ($term_dif <= 0) $term_status = "full";
                                        else if ($term_dif > 0 && $term_dif <= 5) $term_status = "ends";
                                        else if ($term_dif > 5) $term_status = "avaliable";
                                        ?>
                        <?php if ($term_status == "avaliable") : ?>
                        <span class="terms-status avaliable">
                            Dostępne miejsca
                        </span>
                        <?php elseif ($term_status == "ends") : ?>
                        <span class="terms-status ends">
                            Miejsca na wyczerpaniu
                        </span>
                        <?php elseif ($term_status == "full") : ?>
                        <span class="terms-status full">
                            Rezerwacja wstrzymana
                        </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong>Kurs: </strong>
                        <?php echo get_post(get_field("term_course"))->post_title; ?>
                    </td>
                    <td>
                        <strong>Tryb wykładów: </strong>
                        <?php echo get_field("term_type"); ?>
                    </td>
                    <td>
                        <strong>Godzina: </strong>
                        <?php echo date("H:i", $time); ?>
                    </td>
                    <td>
                        <button class="terms-btn-reserve <?php if ($term_status == "full") echo 'disabled' ?>"
                            data-term="<?php echo get_the_id(); ?>"
                            data-course="<?php echo get_post(get_field("term_course"))->ID ?>">Zapis się</button>
                    </td>
                </tr>
            </table>
            <?php endwhile; ?>
        </div>
        <?php else : ?>
        <div class="terms-info no-terms">
            Brak dostępnych terminów
        </div>
        <?php endif; ?>
    </div>
    <?php wp_reset_query();
        endforeach; ?>
</div>
<?php
    // FUNCTION MARKUP END
    return ob_get_clean();
}