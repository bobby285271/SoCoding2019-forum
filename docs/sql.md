## 数据表

**测试账户、数据表名称都在 `controller/public/function.php` 配置**

> 其它位置需要到数据表名称时使用下面给出的变量，括号内的为字段类型。

* 用户 `$userTable`： 用户昵称 nickname (text), 用户账户 account (text), 用户密码 passwd (text)
* 帖子 `$postTable`： 主键 id (bigint, AUTO_INCREMENT), 分类 cat_id (bigint), 用户账户 account (text), 文章标题 bbs_title (text), 文章内容 bbs_content (text)
* 分类 `$categoryTable`：分类 cat_id (bigint, AUTO_INCREMENT), 类别名称 cat_name (text)
* 评论 `$commentTable`： **帖子** 主键 id (bigint), 用户账户 account (text), 评论内容 content (text)