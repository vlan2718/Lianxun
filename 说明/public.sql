/*
 Navicat Premium Data Transfer

 Source Server         : 101.201.111.14
 Source Server Type    : PostgreSQL
 Source Server Version : 90606
 Source Host           : 101.201.111.14:5432
 Source Catalog        : union_news
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90606
 File Encoding         : 65001

 Date: 11/06/2018 11:42:12
*/


-- ----------------------------
-- Sequence structure for u_admin_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_admin_id_seq";
CREATE SEQUENCE "public"."u_admin_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_advertising_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_advertising_id_seq";
CREATE SEQUENCE "public"."u_advertising_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_integral_rule_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_integral_rule_id_seq";
CREATE SEQUENCE "public"."u_integral_rule_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_message_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_message_id_seq";
CREATE SEQUENCE "public"."u_message_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_category_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_category_id_seq";
CREATE SEQUENCE "public"."u_news_category_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_id_seq";
CREATE SEQUENCE "public"."u_news_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_point_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_point_id_seq";
CREATE SEQUENCE "public"."u_news_point_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_report_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_report_id_seq";
CREATE SEQUENCE "public"."u_news_report_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_special_comment_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_special_comment_id_seq";
CREATE SEQUENCE "public"."u_news_special_comment_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_tag_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_tag_id_seq";
CREATE SEQUENCE "public"."u_news_tag_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_tag_id_seq1
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_tag_id_seq1";
CREATE SEQUENCE "public"."u_news_tag_id_seq1" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_news_tag_relation_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_news_tag_relation_id_seq";
CREATE SEQUENCE "public"."u_news_tag_relation_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_role_id_seq";
CREATE SEQUENCE "public"."u_role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_status_label_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_status_label_id_seq";
CREATE SEQUENCE "public"."u_status_label_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_system_code_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_system_code_id_seq";
CREATE SEQUENCE "public"."u_system_code_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_system_config_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_system_config_id_seq";
CREATE SEQUENCE "public"."u_system_config_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_system_log_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_system_log_id_seq";
CREATE SEQUENCE "public"."u_system_log_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_user_id_seq";
CREATE SEQUENCE "public"."u_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_user_level_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_user_level_id_seq";
CREATE SEQUENCE "public"."u_user_level_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_user_news_history_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_user_news_history_id_seq";
CREATE SEQUENCE "public"."u_user_news_history_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_user_news_tag_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_user_news_tag_id_seq";
CREATE SEQUENCE "public"."u_user_news_tag_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_user_subscribe_category_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_user_subscribe_category_id_seq";
CREATE SEQUENCE "public"."u_user_subscribe_category_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for u_user_subscribe_news_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."u_user_subscribe_news_id_seq";
CREATE SEQUENCE "public"."u_user_subscribe_news_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for u_admin
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_admin";
CREATE TABLE "public"."u_admin" (
  "id" int2 NOT NULL DEFAULT nextval('u_admin_id_seq'::regclass),
  "role_id" int2,
  "username" varchar(20) COLLATE "pg_catalog"."default",
  "password" varchar(60) COLLATE "pg_catalog"."default",
  "created_at" int4,
  "updated_at" int4
)
;
COMMENT ON COLUMN "public"."u_admin"."role_id" IS '角色id';
COMMENT ON COLUMN "public"."u_admin"."username" IS '用户名';
COMMENT ON COLUMN "public"."u_admin"."password" IS '密码';
COMMENT ON COLUMN "public"."u_admin"."created_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_admin"."updated_at" IS '修改时间';

-- ----------------------------
-- Table structure for u_advertising
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_advertising";
CREATE TABLE "public"."u_advertising" (
  "id" int4 NOT NULL DEFAULT nextval('u_advertising_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default",
  "order_type" int2,
  "from_time" int4 DEFAULT 0,
  "end_time" int4 DEFAULT 0,
  "duration" int2,
  "image" varchar(255) COLLATE "pg_catalog"."default",
  "url" varchar(300) COLLATE "pg_catalog"."default"
)
;
COMMENT ON COLUMN "public"."u_advertising"."name" IS '名称';
COMMENT ON COLUMN "public"."u_advertising"."order_type" IS '排序';
COMMENT ON COLUMN "public"."u_advertising"."from_time" IS '开始时间';
COMMENT ON COLUMN "public"."u_advertising"."end_time" IS '结束时间';
COMMENT ON COLUMN "public"."u_advertising"."duration" IS '播放时间';
COMMENT ON COLUMN "public"."u_advertising"."image" IS '图片';
COMMENT ON COLUMN "public"."u_advertising"."url" IS '链接地址';

-- ----------------------------
-- Table structure for u_category
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_category";
CREATE TABLE "public"."u_category" (
  "id" int2 NOT NULL DEFAULT nextval('u_news_category_id_seq'::regclass),
  "parent_id" int2 DEFAULT 0,
  "name" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "create_at" int4,
  "updated_at" int4
)
;
COMMENT ON COLUMN "public"."u_category"."parent_id" IS '父类ID';
COMMENT ON COLUMN "public"."u_category"."name" IS '分类名称';
COMMENT ON COLUMN "public"."u_category"."create_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_category"."updated_at" IS '修改时间';

-- ----------------------------
-- Table structure for u_common_tag
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_common_tag";
CREATE TABLE "public"."u_common_tag" (
  "id" int2 NOT NULL DEFAULT nextval('u_news_tag_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "description" varchar(500) COLLATE "pg_catalog"."default",
  "created_at" int4,
  "updated_at" int4
)
;
COMMENT ON COLUMN "public"."u_common_tag"."name" IS '标签名字';
COMMENT ON COLUMN "public"."u_common_tag"."description" IS '标签描述';
COMMENT ON COLUMN "public"."u_common_tag"."created_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_common_tag"."updated_at" IS '修改时间';

-- ----------------------------
-- Table structure for u_integral_rule
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_integral_rule";
CREATE TABLE "public"."u_integral_rule" (
  "id" int2 NOT NULL DEFAULT nextval('u_integral_rule_id_seq'::regclass),
  "name" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "value" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "event" varchar(20) COLLATE "pg_catalog"."default" NOT NULL
)
;
COMMENT ON COLUMN "public"."u_integral_rule"."name" IS '积分项目';
COMMENT ON COLUMN "public"."u_integral_rule"."value" IS '积分设置';
COMMENT ON COLUMN "public"."u_integral_rule"."event" IS '积分事件';

-- ----------------------------
-- Table structure for u_message
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_message";
CREATE TABLE "public"."u_message" (
  "id" int4 NOT NULL DEFAULT nextval('u_message_id_seq'::regclass),
  "user_id" int4,
  "message" varchar(500) COLLATE "pg_catalog"."default",
  "type" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" int4
)
;
COMMENT ON COLUMN "public"."u_message"."user_id" IS '用户id';
COMMENT ON COLUMN "public"."u_message"."message" IS '消息详情';
COMMENT ON COLUMN "public"."u_message"."type" IS '消息类型';
COMMENT ON COLUMN "public"."u_message"."created_at" IS '创建时间';

-- ----------------------------
-- Table structure for u_news
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_news";
CREATE TABLE "public"."u_news" (
  "id" int4 NOT NULL DEFAULT nextval('u_news_id_seq'::regclass),
  "category_id" int4 NOT NULL DEFAULT 0,
  "admin_id" int4 NOT NULL DEFAULT 0,
  "title" varchar(200) COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::character varying,
  "source" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "author" varchar(20) COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::character varying,
  "url" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::character varying,
  "source_date" int4 NOT NULL DEFAULT 0,
  "description" varchar(500) COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::character varying,
  "content" text COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::text,
  "image" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "attachment" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::character varying,
  "public" int2 NOT NULL DEFAULT 0,
  "status" int2 NOT NULL DEFAULT 0,
  "created_at" int4 NOT NULL DEFAULT 0,
  "updated_at" int4 NOT NULL DEFAULT 0,
  "read" int4 NOT NULL DEFAULT 0,
  "status_label_id" int4 NOT NULL DEFAULT 0,
  "order_no" int4 NOT NULL DEFAULT 0,
  "subscribe" int4 NOT NULL DEFAULT 0,
  "import_type" int2 NOT NULL DEFAULT 0
)
;
COMMENT ON COLUMN "public"."u_news"."category_id" IS '分类id';
COMMENT ON COLUMN "public"."u_news"."admin_id" IS '管理员id';
COMMENT ON COLUMN "public"."u_news"."title" IS '标题';
COMMENT ON COLUMN "public"."u_news"."source" IS '来源';
COMMENT ON COLUMN "public"."u_news"."author" IS '作者';
COMMENT ON COLUMN "public"."u_news"."url" IS '原文地址';
COMMENT ON COLUMN "public"."u_news"."source_date" IS '原文时间';
COMMENT ON COLUMN "public"."u_news"."description" IS '信息短述';
COMMENT ON COLUMN "public"."u_news"."content" IS '信息详情';
COMMENT ON COLUMN "public"."u_news"."image" IS '代表图';
COMMENT ON COLUMN "public"."u_news"."attachment" IS '附件';
COMMENT ON COLUMN "public"."u_news"."public" IS '浏览权限';
COMMENT ON COLUMN "public"."u_news"."status" IS '状态';
COMMENT ON COLUMN "public"."u_news"."created_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_news"."updated_at" IS '修改时间';
COMMENT ON COLUMN "public"."u_news"."read" IS '阅读次数';
COMMENT ON COLUMN "public"."u_news"."status_label_id" IS '状态标签id';
COMMENT ON COLUMN "public"."u_news"."order_no" IS '序号';
COMMENT ON COLUMN "public"."u_news"."subscribe" IS '关注数量';

-- ----------------------------
-- Table structure for u_news_category
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_news_category";
CREATE TABLE "public"."u_news_category" (
  "id" int2 NOT NULL DEFAULT nextval('u_news_category_id_seq'::regclass),
  "news_id" int4 DEFAULT 0,
  "category_id" int4 NOT NULL,
  "create_at" int4,
  "updated_at" int4,
  "order_no" int2 DEFAULT 0,
  "is_nav" int2 DEFAULT 0
)
;
COMMENT ON COLUMN "public"."u_news_category"."news_id" IS '父类ID';
COMMENT ON COLUMN "public"."u_news_category"."category_id" IS '分类名称';
COMMENT ON COLUMN "public"."u_news_category"."create_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_news_category"."updated_at" IS '修改时间';
COMMENT ON COLUMN "public"."u_news_category"."order_no" IS '序号';
COMMENT ON COLUMN "public"."u_news_category"."is_nav" IS '显示到导航';

-- ----------------------------
-- Table structure for u_news_point
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_news_point";
CREATE TABLE "public"."u_news_point" (
  "id" int4 NOT NULL DEFAULT nextval('u_news_point_id_seq'::regclass),
  "user_id" int4,
  "news_id" int4,
  "point" int2,
  "created_at" int4
)
;
COMMENT ON COLUMN "public"."u_news_point"."user_id" IS '用户id';
COMMENT ON COLUMN "public"."u_news_point"."news_id" IS '新闻id';
COMMENT ON COLUMN "public"."u_news_point"."point" IS '得分';
COMMENT ON COLUMN "public"."u_news_point"."created_at" IS '创建日期';

-- ----------------------------
-- Table structure for u_news_report
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_news_report";
CREATE TABLE "public"."u_news_report" (
  "id" int4 NOT NULL DEFAULT nextval('u_news_report_id_seq'::regclass),
  "user_id" int4,
  "reason" varchar(100) COLLATE "pg_catalog"."default",
  "remark" varchar(200) COLLATE "pg_catalog"."default"
)
;
COMMENT ON COLUMN "public"."u_news_report"."user_id" IS '用户id';
COMMENT ON COLUMN "public"."u_news_report"."reason" IS '举报原因';
COMMENT ON COLUMN "public"."u_news_report"."remark" IS '备注';

-- ----------------------------
-- Table structure for u_news_special_comment
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_news_special_comment";
CREATE TABLE "public"."u_news_special_comment" (
  "id" int4 NOT NULL DEFAULT nextval('u_news_special_comment_id_seq'::regclass),
  "news_id" int4,
  "content" varchar(500) COLLATE "pg_catalog"."default",
  "created_at" int4,
  "updated_at" int4
)
;
COMMENT ON COLUMN "public"."u_news_special_comment"."news_id" IS '新闻ID';
COMMENT ON COLUMN "public"."u_news_special_comment"."content" IS '解讯内容';
COMMENT ON COLUMN "public"."u_news_special_comment"."created_at" IS '创建日期';
COMMENT ON COLUMN "public"."u_news_special_comment"."updated_at" IS '修改日期';

-- ----------------------------
-- Table structure for u_news_tag
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_news_tag";
CREATE TABLE "public"."u_news_tag" (
  "id" int4 NOT NULL DEFAULT nextval('u_news_tag_id_seq1'::regclass),
  "news_id" int4 NOT NULL,
  "tag_id" int4 NOT NULL
)
;

-- ----------------------------
-- Table structure for u_role
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_role";
CREATE TABLE "public"."u_role" (
  "id" int2 NOT NULL DEFAULT nextval('u_role_id_seq'::regclass),
  "name" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" int4 DEFAULT 0,
  "updated_at" int4 DEFAULT 0
)
;

-- ----------------------------
-- Table structure for u_status_label
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_status_label";
CREATE TABLE "public"."u_status_label" (
  "id" int2 NOT NULL DEFAULT nextval('u_status_label_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "description" varchar(500) COLLATE "pg_catalog"."default",
  "created_at" int4,
  "updated-at" int4
)
;
COMMENT ON COLUMN "public"."u_status_label"."name" IS '标签名称';
COMMENT ON COLUMN "public"."u_status_label"."description" IS '标签描述';
COMMENT ON COLUMN "public"."u_status_label"."created_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_status_label"."updated-at" IS '修改时间';

-- ----------------------------
-- Table structure for u_system_code
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_system_code";
CREATE TABLE "public"."u_system_code" (
  "id" int4 NOT NULL DEFAULT nextval('u_system_code_id_seq'::regclass),
  "code" varchar(10) COLLATE "pg_catalog"."default",
  "mobile" varchar(15) COLLATE "pg_catalog"."default",
  "status" int2
)
;
COMMENT ON COLUMN "public"."u_system_code"."code" IS '邀请码';
COMMENT ON COLUMN "public"."u_system_code"."mobile" IS '发送的手机号';
COMMENT ON COLUMN "public"."u_system_code"."status" IS '是否被使用';

-- ----------------------------
-- Table structure for u_system_config
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_system_config";
CREATE TABLE "public"."u_system_config" (
  "id" int2 NOT NULL DEFAULT nextval('u_system_config_id_seq'::regclass),
  "logo" varchar(500) COLLATE "pg_catalog"."default",
  "launch_image" varchar(500) COLLATE "pg_catalog"."default"
)
;
COMMENT ON COLUMN "public"."u_system_config"."logo" IS '系统logo';
COMMENT ON COLUMN "public"."u_system_config"."launch_image" IS 'APP首页启动图片';

-- ----------------------------
-- Table structure for u_system_log
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_system_log";
CREATE TABLE "public"."u_system_log" (
  "id" int4 NOT NULL DEFAULT nextval('u_system_log_id_seq'::regclass),
  "admin_id" int4,
  "action" varchar(300) COLLATE "pg_catalog"."default",
  "created_at" int4
)
;

-- ----------------------------
-- Table structure for u_tag_relation
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_tag_relation";
CREATE TABLE "public"."u_tag_relation" (
  "id" int4 NOT NULL DEFAULT nextval('u_news_tag_relation_id_seq'::regclass),
  "tag_id" int4,
  "tag_relation_id" int4
)
;
COMMENT ON COLUMN "public"."u_tag_relation"."tag_id" IS '标签ID';
COMMENT ON COLUMN "public"."u_tag_relation"."tag_relation_id" IS '相关标签ID';

-- ----------------------------
-- Table structure for u_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user";
CREATE TABLE "public"."u_user" (
  "id" int4 NOT NULL DEFAULT nextval('u_user_id_seq'::regclass),
  "mobile" varchar(15) COLLATE "pg_catalog"."default",
  "nickname" varchar(255) COLLATE "pg_catalog"."default",
  "level" int2,
  "name" varchar(10) COLLATE "pg_catalog"."default",
  "gender" int2,
  "password" varchar(32) COLLATE "pg_catalog"."default",
  "head_img" varchar(255) COLLATE "pg_catalog"."default",
  "description" varchar(300) COLLATE "pg_catalog"."default",
  "user_status" int2,
  "created_at" int4,
  "updated_at" int4,
  "user_invited_code" varchar(10) COLLATE "pg_catalog"."default",
  "openid" varchar(100) COLLATE "pg_catalog"."default",
  "platform" int2,
  "reg_invite_code" varchar(10) COLLATE "pg_catalog"."default",
  "reg_code_type" int2
)
;
COMMENT ON COLUMN "public"."u_user"."mobile" IS '手机号码';
COMMENT ON COLUMN "public"."u_user"."nickname" IS '昵称';
COMMENT ON COLUMN "public"."u_user"."level" IS '会员等级';
COMMENT ON COLUMN "public"."u_user"."name" IS '真实姓名';
COMMENT ON COLUMN "public"."u_user"."gender" IS '性别';
COMMENT ON COLUMN "public"."u_user"."password" IS '密码';
COMMENT ON COLUMN "public"."u_user"."head_img" IS '头像';
COMMENT ON COLUMN "public"."u_user"."description" IS '描述';
COMMENT ON COLUMN "public"."u_user"."user_status" IS '状态';
COMMENT ON COLUMN "public"."u_user"."created_at" IS '注册时间';
COMMENT ON COLUMN "public"."u_user"."updated_at" IS '最后修改时间';
COMMENT ON COLUMN "public"."u_user"."user_invited_code" IS '用户的邀请码';
COMMENT ON COLUMN "public"."u_user"."openid" IS '第三方登陆id';
COMMENT ON COLUMN "public"."u_user"."platform" IS '第三方登陆平台';
COMMENT ON COLUMN "public"."u_user"."reg_invite_code" IS '注册邀请码';
COMMENT ON COLUMN "public"."u_user"."reg_code_type" IS '邀请码类型';

-- ----------------------------
-- Table structure for u_user_authentication
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_authentication";
CREATE TABLE "public"."u_user_authentication" (
  "user_id" int4 NOT NULL,
  "real_name" varchar(20) COLLATE "pg_catalog"."default",
  "id_card" varchar(20) COLLATE "pg_catalog"."default",
  "organizaztion" varchar(50) COLLATE "pg_catalog"."default",
  "duty" varchar(40) COLLATE "pg_catalog"."default",
  "id_card_facade" varchar(500) COLLATE "pg_catalog"."default",
  "id_card_verso" varchar(500) COLLATE "pg_catalog"."default"
)
;
COMMENT ON COLUMN "public"."u_user_authentication"."real_name" IS '真实姓名';
COMMENT ON COLUMN "public"."u_user_authentication"."id_card" IS '身份证号';
COMMENT ON COLUMN "public"."u_user_authentication"."organizaztion" IS '工作单位';
COMMENT ON COLUMN "public"."u_user_authentication"."duty" IS '职务';
COMMENT ON COLUMN "public"."u_user_authentication"."id_card_facade" IS '身份证正面';
COMMENT ON COLUMN "public"."u_user_authentication"."id_card_verso" IS '身份证反面';

-- ----------------------------
-- Table structure for u_user_level
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_level";
CREATE TABLE "public"."u_user_level" (
  "id" int4 NOT NULL DEFAULT nextval('u_user_level_id_seq'::regclass),
  "name" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "sign_days" int2 NOT NULL DEFAULT 0,
  "integral" int4 NOT NULL DEFAULT 0,
  "created_at" int4 DEFAULT 0,
  "updated_at" int4 DEFAULT 0
)
;
COMMENT ON COLUMN "public"."u_user_level"."name" IS '级别名称';
COMMENT ON COLUMN "public"."u_user_level"."sign_days" IS '签到天数';
COMMENT ON COLUMN "public"."u_user_level"."integral" IS '达标积分';
COMMENT ON COLUMN "public"."u_user_level"."created_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_user_level"."updated_at" IS '修改时间';

-- ----------------------------
-- Table structure for u_user_news
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_news";
CREATE TABLE "public"."u_user_news" (
  "id" int4 NOT NULL,
  "user_id" int4,
  "news_id" int4,
  "is_original" int2 DEFAULT 0,
  "created_at" int4,
  "description" varchar(500) COLLATE "pg_catalog"."default",
  "content" text COLLATE "pg_catalog"."default",
  "public" int2,
  "status" int2,
  "address" varchar(200) COLLATE "pg_catalog"."default"
)
;
COMMENT ON COLUMN "public"."u_user_news"."user_id" IS '用户id';
COMMENT ON COLUMN "public"."u_user_news"."news_id" IS '新闻id';
COMMENT ON COLUMN "public"."u_user_news"."is_original" IS '是否原创';
COMMENT ON COLUMN "public"."u_user_news"."created_at" IS '创建/收藏时间';
COMMENT ON COLUMN "public"."u_user_news"."description" IS '新闻概述';
COMMENT ON COLUMN "public"."u_user_news"."content" IS '新闻详情';
COMMENT ON COLUMN "public"."u_user_news"."public" IS '权限';
COMMENT ON COLUMN "public"."u_user_news"."status" IS '状态';
COMMENT ON COLUMN "public"."u_user_news"."address" IS '发布地址';

-- ----------------------------
-- Table structure for u_user_news_history
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_news_history";
CREATE TABLE "public"."u_user_news_history" (
  "id" int4 NOT NULL DEFAULT nextval('u_user_news_history_id_seq'::regclass),
  "user_id" int4,
  "news_id" int4,
  "create_at" int4,
  "updated_at" int4
)
;
COMMENT ON COLUMN "public"."u_user_news_history"."user_id" IS '用户ID';
COMMENT ON COLUMN "public"."u_user_news_history"."news_id" IS '新闻ID';
COMMENT ON COLUMN "public"."u_user_news_history"."create_at" IS '创建时间';
COMMENT ON COLUMN "public"."u_user_news_history"."updated_at" IS '修改时间';

-- ----------------------------
-- Table structure for u_user_news_tag
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_news_tag";
CREATE TABLE "public"."u_user_news_tag" (
  "id" int4 NOT NULL DEFAULT nextval('u_user_news_tag_id_seq'::regclass),
  "news_id" int4,
  "tag_id" int4
)
;

-- ----------------------------
-- Table structure for u_user_subscribe_category
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_subscribe_category";
CREATE TABLE "public"."u_user_subscribe_category" (
  "id" int4 NOT NULL DEFAULT nextval('u_user_subscribe_category_id_seq'::regclass),
  "user_id" int4,
  "category_id" int4,
  "created_at" int4
)
;
COMMENT ON COLUMN "public"."u_user_subscribe_category"."user_id" IS '用户ID';
COMMENT ON COLUMN "public"."u_user_subscribe_category"."category_id" IS '分类ID';
COMMENT ON COLUMN "public"."u_user_subscribe_category"."created_at" IS '收藏时间';

-- ----------------------------
-- Table structure for u_user_subscribe_news
-- ----------------------------
DROP TABLE IF EXISTS "public"."u_user_subscribe_news";
CREATE TABLE "public"."u_user_subscribe_news" (
  "id" int4 NOT NULL DEFAULT nextval('u_user_subscribe_news_id_seq'::regclass),
  "user_id" int4,
  "news_id" int4,
  "created_at" int4
)
;
COMMENT ON COLUMN "public"."u_user_subscribe_news"."user_id" IS '用户ID';
COMMENT ON COLUMN "public"."u_user_subscribe_news"."news_id" IS '新闻ID';
COMMENT ON COLUMN "public"."u_user_subscribe_news"."created_at" IS '收藏时间';

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."u_admin_id_seq"
OWNED BY "public"."u_admin"."id";
SELECT setval('"public"."u_admin_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_advertising_id_seq"
OWNED BY "public"."u_advertising"."id";
SELECT setval('"public"."u_advertising_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_integral_rule_id_seq"
OWNED BY "public"."u_integral_rule"."id";
SELECT setval('"public"."u_integral_rule_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_message_id_seq"
OWNED BY "public"."u_message"."id";
SELECT setval('"public"."u_message_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_category_id_seq"
OWNED BY "public"."u_news_category"."id";
SELECT setval('"public"."u_news_category_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_id_seq"
OWNED BY "public"."u_news"."id";
SELECT setval('"public"."u_news_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_point_id_seq"
OWNED BY "public"."u_news_point"."id";
SELECT setval('"public"."u_news_point_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_report_id_seq"
OWNED BY "public"."u_news_report"."id";
SELECT setval('"public"."u_news_report_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_special_comment_id_seq"
OWNED BY "public"."u_news_special_comment"."id";
SELECT setval('"public"."u_news_special_comment_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_tag_id_seq"
OWNED BY "public"."u_common_tag"."id";
SELECT setval('"public"."u_news_tag_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_news_tag_id_seq1"
OWNED BY "public"."u_news_tag"."id";
SELECT setval('"public"."u_news_tag_id_seq1"', 2, false);
ALTER SEQUENCE "public"."u_news_tag_relation_id_seq"
OWNED BY "public"."u_tag_relation"."id";
SELECT setval('"public"."u_news_tag_relation_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_role_id_seq"
OWNED BY "public"."u_role"."id";
SELECT setval('"public"."u_role_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_status_label_id_seq"
OWNED BY "public"."u_status_label"."id";
SELECT setval('"public"."u_status_label_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_system_code_id_seq"
OWNED BY "public"."u_system_code"."id";
SELECT setval('"public"."u_system_code_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_system_config_id_seq"
OWNED BY "public"."u_system_config"."id";
SELECT setval('"public"."u_system_config_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_system_log_id_seq"
OWNED BY "public"."u_system_log"."id";
SELECT setval('"public"."u_system_log_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_user_id_seq"
OWNED BY "public"."u_user"."id";
SELECT setval('"public"."u_user_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_user_level_id_seq"
OWNED BY "public"."u_user_level"."id";
SELECT setval('"public"."u_user_level_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_user_news_history_id_seq"
OWNED BY "public"."u_user_news_history"."id";
SELECT setval('"public"."u_user_news_history_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_user_news_tag_id_seq"
OWNED BY "public"."u_user_news_tag"."id";
SELECT setval('"public"."u_user_news_tag_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_user_subscribe_category_id_seq"
OWNED BY "public"."u_user_subscribe_category"."id";
SELECT setval('"public"."u_user_subscribe_category_id_seq"', 2, false);
ALTER SEQUENCE "public"."u_user_subscribe_news_id_seq"
OWNED BY "public"."u_user_subscribe_news"."id";
SELECT setval('"public"."u_user_subscribe_news_id_seq"', 2, false);

-- ----------------------------
-- Primary Key structure for table u_admin
-- ----------------------------
ALTER TABLE "public"."u_admin" ADD CONSTRAINT "u_admin_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_advertising
-- ----------------------------
ALTER TABLE "public"."u_advertising" ADD CONSTRAINT "u_advertising_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_category
-- ----------------------------
ALTER TABLE "public"."u_category" ADD CONSTRAINT "u_news_category_copy1_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_common_tag
-- ----------------------------
ALTER TABLE "public"."u_common_tag" ADD CONSTRAINT "u_news_tag_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_integral_rule
-- ----------------------------
ALTER TABLE "public"."u_integral_rule" ADD CONSTRAINT "u_integral_rule_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_message
-- ----------------------------
ALTER TABLE "public"."u_message" ADD CONSTRAINT "u_message_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_news
-- ----------------------------
ALTER TABLE "public"."u_news" ADD CONSTRAINT "u_news_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_news_category
-- ----------------------------
ALTER TABLE "public"."u_news_category" ADD CONSTRAINT "u_news_category_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_news_report
-- ----------------------------
ALTER TABLE "public"."u_news_report" ADD CONSTRAINT "u_news_report_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_news_special_comment
-- ----------------------------
ALTER TABLE "public"."u_news_special_comment" ADD CONSTRAINT "u_news_special_comment_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_news_tag
-- ----------------------------
ALTER TABLE "public"."u_news_tag" ADD CONSTRAINT "u_news_tag_pkey1" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_role
-- ----------------------------
ALTER TABLE "public"."u_role" ADD CONSTRAINT "u_role_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_status_label
-- ----------------------------
ALTER TABLE "public"."u_status_label" ADD CONSTRAINT "u_status_label_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_system_code
-- ----------------------------
ALTER TABLE "public"."u_system_code" ADD CONSTRAINT "u_system_code_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_system_config
-- ----------------------------
ALTER TABLE "public"."u_system_config" ADD CONSTRAINT "u_system_config_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_system_log
-- ----------------------------
ALTER TABLE "public"."u_system_log" ADD CONSTRAINT "u_system_log_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_tag_relation
-- ----------------------------
ALTER TABLE "public"."u_tag_relation" ADD CONSTRAINT "u_news_tag_relation_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user
-- ----------------------------
ALTER TABLE "public"."u_user" ADD CONSTRAINT "u_user_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user_authentication
-- ----------------------------
ALTER TABLE "public"."u_user_authentication" ADD CONSTRAINT "u_user_authentication_pkey" PRIMARY KEY ("user_id");

-- ----------------------------
-- Primary Key structure for table u_user_level
-- ----------------------------
ALTER TABLE "public"."u_user_level" ADD CONSTRAINT "u_user_level_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user_news
-- ----------------------------
ALTER TABLE "public"."u_user_news" ADD CONSTRAINT "u_user_news_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user_news_history
-- ----------------------------
ALTER TABLE "public"."u_user_news_history" ADD CONSTRAINT "u_user_news_history_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user_news_tag
-- ----------------------------
ALTER TABLE "public"."u_user_news_tag" ADD CONSTRAINT "u_user_news_tag_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user_subscribe_category
-- ----------------------------
ALTER TABLE "public"."u_user_subscribe_category" ADD CONSTRAINT "u_user_subscribe_category_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table u_user_subscribe_news
-- ----------------------------
ALTER TABLE "public"."u_user_subscribe_news" ADD CONSTRAINT "u_user_subscribe_news_pkey" PRIMARY KEY ("id");
