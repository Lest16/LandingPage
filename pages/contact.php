<section class="map">
    <div class="sendFormSuccess">Ваши данные успешно отправлены</div>
    <div class="contact-form">
        <form class="form" method="post" action="ajaxForm.php">
            <span>Contact</span>
            <div class="form-item">
                <input type="text" name="contactName" class="form-control" placeholder="Your Name" required>
                <label class="contactName error"></label>
            </div>

            <div class="form-item">
                <input type="email" name="contactEmail" class="form-control" placeholder="Your Email" required>
                <label class="contactEmail error"></label>
            </div>

            <div class="form-item">
                <input type="phone" name="contactPhone" class="form-control" placeholder="Your Phone">
                <label class="contactPhone error"></label>
            </div>

            <div class="form-item">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
            </div>

            <div class="form-item">
                <textarea class="form-control" name="message" rows="7" placeholder="Message"></textarea>
            </div>

            <input type="hidden" name="dateOpenForm" value="<?echo date('Y-m-d H:i:s');?>"/>
            <button type="submit" class="button">Send</button>
        </form>
    </div>
    <div class="map-container" id="ymap"></div>

</section>