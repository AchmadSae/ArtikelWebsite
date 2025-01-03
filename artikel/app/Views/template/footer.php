<footer>
    <div class="footer">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-12 comments">
                <form action="<?php echo base_url('/insight_and_comment'); ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <input type="text" name="username" id="username" value="<?= $username ?>"
                        class="d-none form-control">
                    <input type="text" name="toMail" id="mail" value="<?= $toEmail ?>"
                        class="d-none form-control"> 
                    <label for="inputQuotes" class="form-label">Insight and Comments Our Website:</label>
                    <textarea name="comments" type="text" class="form-control" id="inputQuotes" rows="2"></textarea>
                    <button type="submit" class="btn"><i class="fa-solid fa-envelope"></i> Send</button>
                </form>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12">
                <div class="right-foot mt-4">
                    <a href="#"><i class="fa-solid fa-phone"></i></a>
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>

                <div class="right-foot mt-2">
                    <ul>
                        <!-- link into my whatsapp -->
                        <li><a href="#">Contact us</a></li>
                        <!-- description about article flow business my web app -->
                        <li><a href="#">Our Services</a></li>
                        <!-- describe about rules -->
                        <li><a href="#">Portfolio</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row bottom mt-4">
            <P>
                KA SAE Copyright © 2024 Inferno - All rights reserved || Designed By: Achmad Saepudin
            </P>
        </div>
    </div>
</footer>