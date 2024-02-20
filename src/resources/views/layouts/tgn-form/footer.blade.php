<footer class="" data-turbo-permanent id="page-main-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex">
                    <div class="tarragona-logo">
                        @svg('vendor/ajtarragona/images/tarragona-logo.svg' )
                     </div>
                    @include('t-components::layouts.common.social', ['color' => 'secondary'])

                </div>


            </div>
        </div>
        <div class="border-top mt-4 pt-4">
            <div class="col">
                <small>
                    <a class="text-reset me-3" rel="noopener" target="_blank" href="https://www.tarragona.cat/avis-legal" aria-label="{{ __t("Normativa legal")}}">{{ __t("Normativa legal") }} </a>
                    <a class="text-reset me-3" rel="noopener" target="_blank" href="https://seu.tarragona.cat/sta/CarpetaPublic/doEvent?APP_CODE=STA&amp;PAGE_CODE=PTS2_PRIVACIDAD" aria-label="{{ __t("Tractament de dades personals")}}">{{ __t("Tractament de dades personals")}}</a>
                    <a class="text-reset me-3" rel="noopener" target="_blank" href="https://seu.tarragona.cat/sta/CarpetaPublic/doEvent?APP_CODE=STA&amp;PAGE_CODE=CATALOGO" aria-label="{{ __t("Catàleg de tràmits")}}">{{ __t("Catàleg de tràmits")}}</a>
                    <a class="text-reset me-3" rel="noopener" target="_blank" href="https://seu.tarragona.cat/sta/" aria-label="{{ __t("Seu electrònica")}}">{{ __t("Seu electrònica")}}</a>
                    <a class="text-reset me-3" rel="noopener" target="_blank" href="https://www.tarragona.cat/" aria-label="{{ __t("Lloc web")}}">{{ __t("Lloc web")}}</a>
                </small>
            </div>
        </div>
    </div>
</footer>
