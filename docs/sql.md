## 数据表

**测试账户、数据表名称都在 `controller/public/function.php` 配置**

> 其它位置需要到数据表名称时使用下面给出的变量，括号内的为字段类型。

* 用户 `$userTable`： 用户昵称 user_nickname (text), 用户账户 user_account (text), 用户密码 user_passwd (text), 是否管理员 user_isadmin (bit)
* 帖子 `$postTable`： 主键 id (bigint, AUTO_INCREMENT), 分类 category_id (bigint), 用户账户 user_account (text), 文章标题 post_title (text), 文章内容 post_content (text), 分类 category_id (bigint)
* 分类 `$categoryTable`：分类 category_id (bigint, AUTO_INCREMENT), 类别名称 category_name (text), 类别描述 category_description (text)
* 评论 `$commentTable`： **帖子** 主键 id (bigint), 用户账户 user_account (text), 评论内容 comment_content (text)