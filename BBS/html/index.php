<?php
require '../php/db_func.php';
//1.查询数据库
//2.写SQL语句
$sql = "SELECT id,username,email,birthday,sex,created_at,login_at,login_ip
        FROM user ORDER BY id DESC";
$data = query($sql);
//3.遍历数据
require 'header.php';
?>
<div>
</div>
<div>
    <table>
        <thead>
        <th>ID</th>
        <th>用户名</th>
        <th>邮箱</th>
        <th>生日</th>
        <th>性别</th>
        <th>创建时间</th>
        <th>最后登录时间</th>
        <th>最后登录IP</th>
        </thead>
        <tbody>
        <?php foreach($data as $admin): ?>
        <tr>
            <td><?php echo $admin['id']; ?></td>
            <td><?php echo $admin['username']; ?></td>
            <td><?php echo $admin['email']; ?></td>
            <td><?php echo $admin['birthday']; ?></td>
            <td><?php echo $admin['sex']; ?></td>
            <td><?php echo $admin['created_at']; ?></td>
            <td><?php echo $admin['login_at']; ?></td>
            <td><?php echo long2ip($admin['login_ip']); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require 'footer.php';
?>