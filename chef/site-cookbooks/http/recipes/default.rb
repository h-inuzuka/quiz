#
# Cookbook Name:: http
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

package "httpd" do
  action :install
  options "--enablerepo=remi" 
end

service "httpd" do
  action [ :enable, :start ]
end

