<?$this->theme->header()?>
<div class="container">
    <div class="m_margpad_tb">
        <h4>Панель управления</h4>
    </div>
    <div class="row">
        <div class="col-4">
            тут будет разного рода информация об обновлениях
        </div>
        <div class="col-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Мероприятия</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Активность</a>
                </li>
            </ul>
            <div class="tab-content m_tabs_addition" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    Тут будут новости
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    Тут будут мероприятия
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    Тут будет отображаться активность
                </div>
            </div>
        </div>
    </div>
</div>
<?$this->theme->footer()?>