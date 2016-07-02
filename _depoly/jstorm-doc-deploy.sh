#! /bin/bash

tmp_dir=/home/admin/blog-tmp
git=/usr/bin/git
branch=pages
public=/home/admin/www/public/

rm -rf $tmp_dir
mkdir $tmp_dir
cd $tmp_dir
$git init
$git remote add origin https://github.com/maigo-uestc/jstorm-doc-test.git
echo "[INFO] pull from git repo"
$git pull origin master
rm -rf .git
echo "[INFO] copy from tmp dir to public dir"
rm -rf $public
cp -rf $tmp_dir $public

echo "[INFO] success"