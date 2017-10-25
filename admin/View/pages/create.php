<?php $this->theme->header();?>
<div class="container">
    <div class="row m_margpad_tb">
        <div>
            <h5>Создать страницу</h5>
        </div>
    </div>
    <form action="/admin/page/create/process" method="post">
        <div class="form-group">
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Зазоловок">
        </div>

        <div class="form-group">
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Контент"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Опубликовать</button>
        </div>
    </form>
</div>
<?php $this->theme->footer()?>