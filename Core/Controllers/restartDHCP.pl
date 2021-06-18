#!/usr/local/bin/perl

my @args = ("systemctl restart dhcpd.service");
system(@args) == 0
    or die "system @args failed: $?";