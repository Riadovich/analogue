<?php $this->theme->header()?>
<div class="container">
    <div class="row m_margpad_tb">
        <div class="col-10">
            <h5>Список станиц</h5>
        </div>
        <div class="col-2"><a href="/admin/page/create" class="btn btn-primary btn-sm">Создать страницу</a></div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Контент</th>
            <th scope="col">Дата</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?foreach($pages as $page):?>
        <tr>
            <th scope="row"><?=$page->id?></th>
            <td><?=$page->title?></td>
            <td><?=$page->content?></td>
            <td><?=$page->date?></td>
            <td> func </td>
        </tr>
        <?endforeach?>
        </tbody>
    </table>
</div>
<?php $this->theme->footer()?>
