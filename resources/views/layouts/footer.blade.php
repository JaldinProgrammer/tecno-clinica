<footer class="footer">
            <div class="footer__container container">
                
                <h1 class="footer__title">Clinica Mendieta</h1>

                <div class="footer__content grid">
                    <div class="footer__data">
                        <p class="footer__description">
                            Subscribete para recibir más información
                        </p>

                        <form action="" class="footer__form" id="contact-form">
                            <input type="mail" name="mail" placeholder="Dirección de email" class="footer__input" id="contact-user">
                            <button type="submit" class="footer__button">
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </form>

                        <p class="footer__messsage" id="contact-message"></p>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">Dirección</h2>
                        <p class="footer__information">
                            KM6 Doble vía la Guardia <br>
                            Santa Cruz, Bolivia
                        </p>
                    </div>


                    <div class="footer__data">
                        <h2 class="footer__subtitle">Horario</h2>
                        <p class="footer__information">
                            Lunes - Sabado <br>
                            8AM - 16PM
                        </p>
                    </div>
                    <span class="footer__description">Cantidad de vistas en la pagina: {{ \App\Models\Log::showViews() }}</span>
                </div>

                <div class="footer__group">
                    <ul class="footer__social">
                        <a href="#" target="_blank" class="footer__social-link">
                            <i class="bx bxl-facebook"></i>
                        </a>
                        <a href="#" target="_blank" class="footer__social-link">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </ul>

                    <span class="footer__copy">
                        &#169; Clinica Mendieta Todos los derechos reservados
                    </span>
                </div>
            </div>
        </footer>