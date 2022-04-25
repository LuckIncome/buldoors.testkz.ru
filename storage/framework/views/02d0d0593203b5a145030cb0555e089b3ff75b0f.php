<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="callback" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Мы перезвоним</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body popup-order-call">
                <form action="#" class="callback callback-form">
                    <?php echo csrf_field(); ?>
                    <div class="row align-items-center">
                        <div class="col-10 offset-1">
                            <p>Получить бесплатную консультацию</p><br>
                            <div class="inputGroup">
                                <label for="name" class="text-left mx-auto mr-lg-auto ml-lg-0 ">Имя</label>
                                <input type="text" id="namex" name="name" placeholder="Ваше имя" class=" mx-auto mr-lg-auto ml-lg-0">
                            </div>
                            <div class="inputGroup">
                                <label for="phone" class="text-left mx-auto mr-lg-auto ml-lg-0 ">Телефон</label>
                                <input type="tel" id="phonex" name="phone" placeholder="Номер телефона" class=" mx-auto mr-lg-auto ml-lg-0">
                            </div>
                        </div>
                        <div class="col-6 offset-3 text-center">
                            <button type="submit" class="button">Оставить заявку</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="videoYoutube" tabindex="-1" role="dialog" aria-labelledby="callback" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="container px-0">
            <div class="row">
                <div class="offset-1 col-10">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <!--<iframe src="https://www.youtube.com/embed/6RmkCPIo-u8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="thank-you" tabindex="-1" role="dialog" aria-labelledby="callback" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle2">Мы перезвоним</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body popup-order-call">
                <h4>Спасибо за заявку!</h4>
                <p>Вас автоматически перенесет на главную страницу через 3
                    секунды</p>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/partials/modals.blade.php ENDPATH**/ ?>