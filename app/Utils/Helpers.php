<?php

function get_git_version(){
  return trim(exec('git tag --sort=taggerdate | tail -n1'));
}
