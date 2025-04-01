<?php
declare(strict_types=1);

/*
 * This file is part of the package typo3-incubator/theme-fcbigfoot.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addTypoScriptSetup(
    trim('
        module.tx_form {
            settings {
                yamlConfigurations {
                    100 = EXT:fcbigfoot/Configuration/Form/Setup.yaml
                }
            }
        }
        plugin.tx_form {
            settings {
                yamlConfigurations {
                    100 = EXT:fcbigfoot/Configuration/Form/Setup.yaml
                }
            }
        }
    ')
);
