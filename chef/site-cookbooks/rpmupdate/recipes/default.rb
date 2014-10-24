#
# Cookbook Name:: rpmupdate
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

bash "epel" do
  code <<-EOC
    rpm -ivh http://ftp.riken.jp/Linux/fedora/epel/6/x86_64/epel-release-6-8.noarch.rpm
  EOC
  not_if 'yum list installed | grep epel-release'
end

bash "remi" do
  code <<-EOC
   rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
  EOC
  not_if 'yum list installed | grep remi-release'
end

