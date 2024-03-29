<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_FirebaseDynamicLinks_CreateShortDynamicLinkRequest extends Google_Model
{
  protected $dynamicLinkInfoType = 'Google_Service_FirebaseDynamicLinks_DynamicLinkInfo';
  protected $dynamicLinkInfoDataType = '';
  public $longDynamicLink;
  protected $suffixType = 'Google_Service_FirebaseDynamicLinks_Suffix';
  protected $suffixDataType = '';

  /**
   * @param Google_Service_FirebaseDynamicLinks_DynamicLinkInfo
   */
  public function setDynamicLinkInfo(Google_Service_FirebaseDynamicLinks_DynamicLinkInfo $dynamicLinkInfo)
  {
    $this->dynamicLinkInfo = $dynamicLinkInfo;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_DynamicLinkInfo
   */
  public function getDynamicLinkInfo()
  {
    return $this->dynamicLinkInfo;
  }
  public function setLongDynamicLink($longDynamicLink)
  {
    $this->longDynamicLink = $longDynamicLink;
  }
  public function getLongDynamicLink()
  {
    return $this->longDynamicLink;
  }
  /**
   * @param Google_Service_FirebaseDynamicLinks_Suffix
   */
  public function setSuffix(Google_Service_FirebaseDynamicLinks_Suffix $suffix)
  {
    $this->suffix = $suffix;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_Suffix
   */
  public function getSuffix()
  {
    return $this->suffix;
  }
}
