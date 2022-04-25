<?php $__env->startSection('seo_title',$page->seo_title ? $page->seo_title : $page->title); ?>
<?php $__env->startSection('meta_keywords',$page->meta_keywords); ?>
<?php $__env->startSection('meta_description',$page->meta_description); ?>
<?php $__env->startSection('content'); ?>
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#"><?php echo e($page->title); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0"><?php echo e($page->title); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="aboutCompany" class="py-3 py-xl-5">
            <div class="container px-lg-0">
                <div class="row">
                    <div id="sideBar" class="col-auto pt-4 pt-xl-0 col-xl-3 mx-auto mx-xl-0 order-last order-xl-first">
                        <div class="leftBar">
                            <h4>Входные и межкомнатные двери</h4>
                            <ul>
                                <li>Продажа</li>
                                <li>Доставка</li>
                                <li>Качественная установка</li>
                            </ul>
                        </div>
                        <h5>Вы можете стать нашим представителем</h5>
                        <form action="">
                            <div>
                                <label for="namePartner">Имя</label>
                                <input id="namePartner" name="namePartner" type="text" placeholder="Андрей">
                            </div>
                            <div>
                                <label for="namePartner">Телефон </label>
                                <input id="namePartner" name="namePartner" type="text" placeholder="+7 (707) 555 51 23">
                            </div>
                            <button type="submit">Оставить заявку</button>
                        </form>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="videoAbout">
                                    <video src="" poster="/img/aboutImg.png"></video>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="videoAboutCaption px-4">
                                    <div>
                                        <h5>О работе завода</h5>
                                        <p>Уникальная производственная база завода, объединяющая лучшие российские и зарубежные технологии, и высокая степень автоматизации позволяют производить до 800 дверей в сутки. В основе производства стальных дверей «Бульдорс» — автоматизированный технологический процесс «от заготовки до упаковки», который обеспечивает полную автоматизацию процесса изготовления продукции.
                                            <br><br> Производственные комплексы завода представлены современным высокотехнологичным оборудованием!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-4">
                                <p class="text-justify mb-4">Автоматические линии изготовления дверных полотен итальянской компании «Salvagnini» позволяют увеличить скорость, мощность производства и качество выпускаемой продукции, максимально исключив человеческий фактор.
                                    <br><br>Автоматические прокатные станы профилирования дверных коробок обеспечивают геометрическую точность профилей стальных дверей и позволяют изготавливать их из единого листа металла, что обеспечивает дополнительную прочность.
                                    <br><br>Роботизированные сварочные комплексы японского производства «Kawasaki» выполняют сварочный шов, не требующий зачистки, что экономит время на операцию и увеличивает прочность соединения.
                                    <br><br>Японская установка лазерной резки «Mazak» позволяет производить прецизионные (высокоточные) операции по лазерной резке металла с высочайшей степенью сложности.</p>
                                <img src="/img/aboutCollage.png" alt="w-100" class="img-fluid d-block mb-4">
                                <p class="text-justify">Большой парк станков с ЧПУ обеспечивает высокую точность исполнения программных операций без участия человека.
                                    <br><br>Автоматические линии порошково-полимерного покрытия швейцарской компании «Gema» обеспечивают равномерное нанесение покрытия в электростатическом поле с помощью автоматических распылителей, что обеспечивает высокое качество нанесения покрытия на дверное полотно.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-4 pt-4">
                                <div class="mb-3"><img src="/img/a1.png" alt="w-100" class="img-fluid w-100"></div>
                                <p class="px-3 text-center" style="font-size: 14px;">Роботизированный сварочный комплекс</p>
                            </div>
                            <div class="col-sm-6 col-md-4 pt-4">
                                <div class="mb-3"><img src="/img/a2.png" alt="w-100" class="img-fluid w-100"></div>
                                <p class="px-3 text-center" style="font-size: 14px;">Покрасочный конвейер автоматической линии</p>
                            </div>
                            <div class="col-sm-6 col-md-4 pt-4">
                                <div class="mb-3"><img src="/img/a3.png" alt="w-100" class="img-fluid w-100"></div>
                                <p class="px-3 text-center" style="font-size: 14px;">Вход в напылительную автоматическую камеру</p>
                            </div>
                            <div class="col-sm-6 col-md-4 pt-4">
                                <div class="mb-3"><img src="/img/a4.png" alt="w-100" class="img-fluid w-100"></div>
                                <p class="px-3 text-center" style="font-size: 14px;">Автоматическая линия профилирования дверных коробок</p>
                            </div>
                            <div class="col-sm-6 col-md-4 pt-4">
                                <div class="mb-3"><img src="/img/a5.png" alt="w-100" class="img-fluid w-100"></div>
                                <p class="px-3 text-center" style="font-size: 14px;">Оснастка линии профилирования</p>
                            </div>
                            <div class="col-sm-6 col-md-4 pt-4">
                                <div class="mb-3"><img src="/img/a6.png" alt="w-100" class="img-fluid w-100"></div>
                                <p class="px-3 text-center" style="font-size: 14px;">Линия изготовления дверных полотен</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/users/b/buldoorskz/domains/buldoors.kz/resources/views/pages/about.blade.php ENDPATH**/ ?>