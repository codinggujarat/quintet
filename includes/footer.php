<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

footer {
    height: 100% !important;
    width: 100% !important;
    padding: 150px !important;
    /* margin: auto !important; */
    background: #ffffff !important;
}

.input_type_newsletter {
    position: relative !important;
    margin-top: 40px !important;
    margin-left: 20px !important;

}

.social_media_newsletter,
.input_type_newsletter {
    margin-top: 40px !important;

}

.join_our_newsletter h1 {
    font-size: 20px !important;
    margin-left: 20px !important;

    text-transform: uppercase !important;
    font-weight: 300 !important;
    font-family: 'Poppins', sans-serif !important;
}

.input_type_newsletter label {
    position: absolute !important;
    top: 50% !important;
    left: 15px !important;
    transform: translateY(-50%) !important;
    color: #000 !important;
    font-size: 12px !important;
    pointer-events: none !important;
    transition: 0.3s !important;
    font-family: 'Poppins', sans-serif !important;
    text-transform: uppercase !important;
    font-weight: 300 !important;

}

.input_type_newsletter input {
    width: 500px !important;
    border: 0 !important;
    border-bottom: 1px solid black !important;
    border-top: 0 !important;
    border-left: 0 !important;
    border-right: 0 !important;
    height: 40px !important;
    padding: 30px !important;
}

.input_type_newsletter input:focus {
    border-bottom: 1px solid black !important;
    border-top: 0 !important;
    border-left: 0 !important;
    border-right: 0 !important;
}

.input_type_newsletter input:focus~label,
.input_type_newsletter input:valid~label {
    top: 0 !important;
    left: 15px !important;
    font-size: 12px !important;
    padding: 0 2px !important;
    background: #fff !important;
    color: #000 !important;
}

.social_media_newsletter ul {
    display: flex !important;
    align-items: center !important;
    justify-content: space-evenly !important;
    margin-top: 100px !important;
}

.social_media_newsletter ul li {
    margin-left: 20px !important;
    text-transform: uppercase !important;
    font-weight: 300 !important;
    font-size: 10px !important;
}

.social_media_newsletter {
    display: flex !important;
    align-items: baseline !important;
    justify-content: start !important;
}

.footLink ul {
    display: block !important;
}

.footLink ul li {
    margin-bottom: 10px !important;
}

.footLink ul li:first-child {
    font-size: 10px !important;
    font-weight: 600 !important;
    color: #000 !important;
    margin-bottom: 20px !important;
    font-family: 'Poppins', sans-serif !important;
    text-transform: uppercase !important;

}

.copyrightfoot {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    /* padding-bottom: 300px !important; */
    padding-top: 50px !important;
    margin-left: 20px !important;
}

.copyrightfoot h1 {
    font-family: 'Poppins', sans-serif !important;
    font-weight: 400 !important;
    font-size: 12px !important;
    text-transform: uppercase !important;
    color: #000 !important;
}

.copyandLanguage {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

.copyandLanguage .messCopy {
    margin-left: 40px !important;
}

@media only screen and (max-width: 800px) {
    footer {
        margin: 0 !important;
        padding: 5px !important;
    }

    .social_media_newsletter ul {
        flex-wrap: wrap !important;
        justify-content: start !important;

    }

    .social_media_newsletter {
        flex-wrap: wrap !important;
        justify-content: space-between !important;
    }
}
</style>
<footer style="background:#ffffff;">
    <div class="join_our_newsletter">
        <h1>
            join our newsletter
        </h1>
    </div>
    <div class="input_type_newsletter ">
        <input type="text" name="" id="" required>
        <label for="">ENTER YOUR EMAIL ADDRESS HERE</label>
    </div>
    <div class="social_media_newsletter">
        <ul>
            <li>Follow us</li>
            <li><a href="">Instagram</a></li>
            <li><a href="">Facebook</a></li>
            <li><a href="">X</a></li>
            <li><a href="">Pinterest</a></li>
            <li><a href="">Youtube</a></li>
            <li><a href="">Spotify</a></li>
        </ul>
    </div>
    <div class="social_media_newsletter">
        <div class="helpFoot footLink">
            <ul>
                <li><a href="">Help</a></li>
                <li><a href="">My Zara Account</a></li>
                <li><a href="">Items and Sizes</a></li>
                <li><a href="">Gift Options</a></li>
                <li><a href="">Shipping</a></li>
                <li><a href="">Payment and Invoices</a></li>
                <li><a href="">My purchases</a></li>
                <li><a href="">Exchanges, returns and refunds</a></li>
                <li><a href="">Zara Experiencies</a></li>
            </ul>
        </div>
        <div class="helpFoot footLink">
            <ul>
                <li><a href="">Policies</a></li>
                <li><a href="">Newsletter</a></li>
                <li><a href="">Instagram</a></li>
                <li><a href="">Facebook</a></li>
                <li><a href="">X</a></li>
                <li><a href="">Pinterest</a></li>
                <li><a href="">Youtube</a></li>
            </ul>
        </div>
        <div class="helpFoot footLink">
            <ul>
                <li><a href="">Company</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">Join Life</a></li>
                <li><a href="">Offices</a></li>
                <li><a href="">Stores</a></li>
                <li><a href="">Work with us</a></li>
            </ul>
        </div>
        <div class="helpFoot footLink">
            <ul>
                <li><a href="">Policies</a></li>
                <li><a href="">Privacy policy</a></li>
                <li><a href="">Purchase conditions</a></li>
                <li><a href="">Gift Card Conditions</a></li>
                <li><a href="">Cookies Settings</a></li>
            </ul>
        </div>
    </div>
    <div class="copyrightfoot">
        <div class="NameOfcountry">
            <h1>INDIA</h1>
        </div>
        <div class="copyandLanguage">
            <div class="language">
                <h1>ENGLISH</h1>
            </div>
            <div class="messCopy">
                <h1>© All rights reserved</h1>
            </div>
        </div>
    </div>
</footer>