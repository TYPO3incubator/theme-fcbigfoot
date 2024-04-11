<?php
declare(strict_types=1);

defined('TYPO3') or die();

call_user_func(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
        trim('
             module.tx_form {
              settings {
                yamlConfigurations {
                  100 = EXT:football/Configuration/Form/Setup.yaml
                }
              }
            }
            plugin.tx_form {
              settings {
                yamlConfigurations {
                  100 = EXT:football/Configuration/Form/Setup.yaml
                }
              }
            }
         ')
    );
});
