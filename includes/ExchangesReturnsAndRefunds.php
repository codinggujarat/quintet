<div class="RegisterAndLogin">
    <ul>
        <button>EXCHANGES, RETURNS AND REFUNDS
        </button>
        <button class="active"><a href="HowToReturn">HOW TO RETURN</a></button>
        <button><a href="HowToExchange">HOW TO EXCHANGE</a></button>
        <button><a href="SpecialReturnConditions">SPECIAL RETURN CONDITIONS</a></button>
    </ul>
    <a href="allhelpcategory">View all help topics</a>

</div>
<style>
.RegisterAndLogin {
    border: 1px solid black;
    padding: 30px 20px;
}


.RegisterAndLogin button:first-child {
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 20px;
    font-weight: 300;
}


.RegisterAndLogin button {
    border: 0;
    width: 100%;
    margin-bottom: -5px;
    display: flex;
    align-items: start;
    text-align: left;
    outline: 0;
    background: transparent;
    font-size: 10px;
    color: #000;
    font-family: 'Poppins', sans-serif;
    font-weight: 300;
}

.RegisterAndLogin a {
    margin-bottom: 10px;
    border: 0;
    outline: 0;
    background: transparent;
    font-size: 12px;
    color: #000;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    text-decoration: underline;
}

.RegisterAndLogin button:hover {
    text-decoration: underline;
}

.RegisterAndLogin button:first-child:hover {
    text-decoration: none;
}

.RegisterAndLogin button a {
    font-size: 11px;
    font-weight: 300;
    text-decoration: none;
}

@media only screen and (max-width: 1000px) {
    .body-content div {
        margin: 0 !important;
    }
}
</style>
<script>
function toggleActive(element) {
    // Remove 'active' class from all elements
    var items = document.querySelectorAll('.menu-item');
    items.forEach(function(item) {
        item.classList.remove('active');
    });

    // Add 'active' class to the clicked element
    element.classList.add('active');
}
</script>