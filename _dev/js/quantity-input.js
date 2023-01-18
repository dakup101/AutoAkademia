
export default function handleQuantityInput(){

    let interval;
    let updBtn = document.querySelector("button[name='update_cart']");   
    

    let inputs = document.querySelectorAll(".input-text.qty");
    console.log(updBtn);
    if (!inputs) return;

    Array.from(inputs).forEach(input => {
        let wrapper = input.parentNode,
            plus = wrapper.querySelector(".qty-plus"),
            minus = wrapper.querySelector(".qty-minus"),
            qtyValue = input.value;
        plus.addEventListener("click", (ev) => {
            ev.preventDefault();
            updBtn.removeAttribute("disabled");
            input.value = ++qtyValue;
            preventUpdate();
            createInterval();
        })
        minus.addEventListener("click", (ev) => {
            ev.preventDefault();
            updBtn.removeAttribute("disabled");
            if (qtyValue > 0) input.value = --qtyValue;
            preventUpdate();
            createInterval();
        })
    })

    function preventUpdate(){
        clearInterval(interval);
    }
    
    function createInterval(){
        console.log("--- Update Interval ---")
        interval = setInterval(()=>{
            updBtn.click();
        }, 1000)
    }
}

