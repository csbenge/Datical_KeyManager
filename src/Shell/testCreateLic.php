<?php

$licenseJSON = '{
    "consumerAmount":XconsumerAmountX,
    "consumerType":"XconsumerTypeX",
    "issuer":"XissuerX",
    "subject":"Datical DB XconsumerTypeX",
    "holder":"CN=XcompanyNameX,O=XcompanyStageX",
    "notAfter":"XnotAfterXT23:59:59-0500",
    "info":"Datical DB XcompanyStageX License"
  }';

  $license = "Evaluation";

  $lic = str_replace("XcompanyStageX", $license, $licenseJSON);
  print($lic);
