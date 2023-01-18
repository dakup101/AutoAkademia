<?php
// $object = current Post Object
$termin_id = $object->ID;
$dividers = get_the_terms( $termin_id, 'terms_dividers' );
$divider_id = $dividers[0]->term_id;
$course_id = get_field("term_course", $termin_id);

$signUps = new WP_Query(array(
    "post_type" => "signups",
    "meta_query" => array(
        "relation" => "AND",
        array(
            "key" => "signup_course",
            "value" => $course_id,
            "compare" => "="
        ),
        array(
            "key" => "signup_term",
            "value" => $termin_id,
            "compare" => "="
        ),
    ),
    "tax_query" => array(
        array(
            "taxonomy" => "terms_dividers",
            "field" => "id",
            "terms" => $divider_id
        ),
    ),
    "order" => "ASC",
));

if ($signUps->have_posts()) : ?>
<div class="term-count">
    <strong>Zapisów:</strong> <?php echo $signUps->found_posts; ?> / <?php echo get_field("term_limit") ?>
</div>
<table class="term-details">
    <thead class="term-details__head">
        <tr>
            <th></th>
            <th>Zapis</th>
            <th>Klient</th>
            <th>Telefon</th>
            <th>E-mail</th>
            <th>Zamówienie</th>
        </tr>
    </thead>
    <tbody class="term-details__body">
        <?php $counter = 1; while($signUps->have_posts()) : $signUps->the_post(); ?>
        <tr class="term-details__item <?php if ($counter%2==0) echo "grayed" ?>">
            <?php
            $signUp_id = get_the_ID();
            $title = get_the_title();
            $name = get_field("singup_name", $signUp_id) . " " . get_field("singup_last_name", $signUp_id);    
            $tel = get_field("signup_tel", $signUp_id);
            $email = get_field("signup_email", $signUp_id);
            $order_link = admin_url( 'post.php?post=' . get_field("signup_order_nr", $signUp_id));
            $signUp_link = get_the_permalink();
            ?>
            <td class="term-details__item--count">
                <span>#<?php echo $counter ?></span>
            </td>
            <td class="term-details__item--title">
                <a href="<?php echo $signUp_link ?>"><?php echo $title ?></a>
            </td>
            <td class="term-details__item--name">
                <span><?php echo $name ?></span>
            </td>
            <td class="term-details__item--tel">
                <a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a>
            </td>
            <td class="term-details__item--email">
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </td>
            <td class="term-details__item--order">
                <a href="<?php echo $order_link; ?>">Sprawdź Zamówienie</a>
            </td>
        </tr>
        <?php
    $counter++;
    endwhile;
    wp_reset_query();
    ?>
    </tbody>
</table>



<?php else : ?>

<?php endif; ?>

<style>
.term-count {
    font-size: 18px;
    margin: 15px 0;
}

.term-details {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;
}

.term-details__head {
    background: #f2f2f2;
    text-align: left;
    border-bottom: 2px solid #333
}

.term-details__head th,
.term-details__body td {
    padding: 10px 5px;
}

.term-details__item {
    border-bottom: 1px solid #ededed;
}

.term-details__item.grayed {
    background: #fafafa
}
</style>