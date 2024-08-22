<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
}

footer {
    width: 100%;
    background: #fff;
}

footer .content {
    max-width: 1350px;
    margin: auto;
    padding: 20px;
    display: flex;
    align-items: baseline;
    flex-wrap: wrap;
    margin-left: 10%;
    margin-right: 10%;
    justify-content: space-between;
}

footer .content p,
a {
    color: #000;
}

footer .content .box {
    width: 33%;
    transition: all 0.4s ease;
}

footer .content .topic {
    cursor: default;
    font-size: 22px;
    font-weight: 400;
    color: #000;
    margin-bottom: 16px;
    text-transform: uppercase;

}

footer .content p {
    text-align: justify;
}

footer .content .lower .topic {
    margin: 24px 0 5px 0;
}

footer .content .lower i {
    padding-right: 16px;
}

footer .content .middle {
    padding-left: 80px;
}

footer .content .middle a {
    line-height: 32px;
    font-size: 15px;
}

footer .content .right input[type="text"] {
    height: 45px;
    width: 100%;
    outline: none;
    color: #000;
    background: transparent;
    border-radius: 5px;
    padding-left: 10px;
    font-size: 17px;
    border: 2px solid #000;
}

footer .content .right input[type="text"]::placeholder {
    color: #000;
}

footer .content .right input[type="submit"] {
    height: 42px;
    width: 100%;
    font-size: 18px;
    color: #fff;
    background: #000;
    outline: none;
    border-radius: 5px;
    letter-spacing: 1px;
    cursor: pointer;
    margin-top: 12px;
    border: 2px solid #000;
    transition: all 0.3s ease-in-out;
}

.content .right input[type="submit"]:hover {
    background: none;
    color: #000;
}

footer .content .media-icons {
    margin-top: 20px;
}

footer .content .media-icons a {
    font-size: 16px;
    height: 45px;
    width: 45px;
    display: inline-block;
    text-align: center;
    line-height: 43px;
    border-radius: 5px;
    border: 2px solid lightgray;
    margin: 30px px 0 0;
    transition: all 0.3s ease;
}

.content .media-icons a:hover {
    border-color: #000;
}

footer .bottom {
    width: 100%;
    text-align: right;
    color: gray;
    padding: 0 40px 5px 0;
}

footer .bottom a {
    color: #000;
}

footer a {
    transition: all 0.3s ease;
}

footer a:hover {
    color: #000;
}

@media (max-width:1100px) {
    footer .content .middle {
        padding-left: 50px;
    }
}

@media (max-width:950px) {
    footer .content .box {
        width: 50%;
    }

    .content .right {
        margin-top: 40px;
    }
}

@media (max-width:560px) {
    footer {
        position: relative;
    }

    footer .content .box {
        width: 100%;
        margin-top: 30px;
    }

    footer .content .middle {
        padding-left: 0;
    }
}
</style>
<footer>
    <div class="">
        <div class="">
            <div class="content">
                <div class="left box">
                    <div class="upper">
                        <div class="topic">About us</div>
                        <p>Learn more about our brand, mission, and values. Discover how we started, what drives us, and
                            our commitment to delivering quality products and exceptional customer experiences.</p>
                    </div>
                    <div class="lower">
                        <div class="topic">Contact us</div>
                        <div style="margin-bottom: 10px;" class="phone">
                            <a href="#"
                                style="font-size: 15px;display: flex;align-items: center  ;justify-content: start ;   "><i
                                    class='bx bxs-phone ' style="font-size: 18px;"></i>+000 0000
                                0000</a>
                        </div>
                        <div class=" email">
                            <a href="#"
                                style="font-size: 15px;display: flex;align-items: center  ;justify-content: start ; "><i
                                    class='bx bxs-envelope ' style="font-size: 18px ;"></i>abc@gmail.com<va>
                        </div>
                    </div>
                </div>
                <div class=" middle box">
                    <div class="topic">Customer Service</div>
                    <div><a href="#">Shipping & Delivery</a></div>
                    <div><a href="track-orders.php">Order Status</a></div>
                    <div><a href="#">Contact Us</a></div>
                </div>
                <div class="right box">
                    <div class="topic">Subscribe us</div>
                    <form action="#">
                        <input type="text" placeholder="Enter email address">
                        <input type="submit" name="" value="Send">
                        <div class="media-icons">
                            <div class="topic">Follow Us</div>
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-youtube'></i></a>
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </form>

                </div>
            </div>
            <div class="bottom">
                <p>Copyright © 2020 <a href="#">Letscodeweb</a> All rights reserved</p>
            </div>
        </div><!-- /.container -->
    </div><!-- /.links-social -->
</footer>