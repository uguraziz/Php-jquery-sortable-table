<div class="table">
        <table>
            <thead>
            <tr>
                <th>Kategori Adı</th>
                <th class="">Kayıt Tarihi</th>
                <th class="">İşlemler</th>
            </tr>
            </thead>
            <tbody id="categori_sortable" data-where = "category_id" data-column ="category_order" data-database = "categories">
                <tr id="id_<?=?>" >
                    <td>
                        name
                    </td>
                    <td class="">
                       	date
                    </td>
                    <td class="">
                        <a href="" class="btn">Edit</a>
                        <a href="" class="btn">Delete</a>
                    </td>
                </tr>
            </tbody>

        </table>

        <script>
            $(function () {
                $("#categori_sortable").sortable({
                    update: function (event, ui) {
                        let postData = $(this).sortable("serialize");
                        postData += "&where=" + $(this).data("where");
                        postData += "&column=" + $(this).data("column");
                        postData += "&database=" + $(this).data("database");
                        $.post(send_api_url + "/sortable-order", postData , function (responce) {

                        },"json");
                    }
                });
            });
        </script>
    </div>

 <!-- ----------------------------- -->


<?php 

$database = post("database");
$where = post("where");
$column = post("column");
$ids = post("id");

foreach ($ids as $key => $value){
        $db->update($database)
            ->where($where, $value)
            ->set([
               $column => $key
        	]);
}

?>