<?php
if (!defined('SYSTEM_ROOT')) {
    die('Insufficient Permissions');
}
$opt = json_decode(option::get('mok_blacklist'), TRUE);
$list = '';
foreach ($opt as $r){
    $list .= htmlspecialchars($r)."\n";
}
?>
<div>
    <?php if($_GET['save'] == 'ok'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>保存名单成功！</strong>
        </div>
    <?php endif; ?>
    <form action="plugins/mok_blacklist/apis.php" method="post">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width:40%">参数</th>
                <th style="width:60%">值</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>黑名单<br/><br/>填写百度用户名，一行一个<br/>此名单内的百度账号将被禁止绑定<br/>注意不要有多余的符号如空格等</td>
                <td>
                    <textarea name="blacklist" class="form-control" rows="20"><?php echo $list; ?></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <input type="submit" class="btn btn-primary" value="保存名单">
    </form>
</div>