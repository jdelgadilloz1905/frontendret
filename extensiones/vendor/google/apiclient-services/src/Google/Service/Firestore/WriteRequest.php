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

class Google_Service_Firestore_WriteRequest extends Google_Collection
{
  protected $collection_key = 'writes';
  public $labels;
  public $streamId;
  public $streamToken;
  protected $writesType = 'Google_Service_Firestore_Write';
  protected $writesDataType = 'array';

  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setStreamId($streamId)
  {
    $this->streamId = $streamId;
  }
  public function getStreamId()
  {
    return $this->streamId;
  }
  public function setStreamToken($streamToken)
  {
    $this->streamToken = $streamToken;
  }
  public function getStreamToken()
  {
    return $this->streamToken;
  }
  /**
   * @param Google_Service_Firestore_Write
   */
  public function setWrites($writes)
  {
    $this->writes = $writes;
  }
  /**
   * @return Google_Service_Firestore_Write
   */
  public function getWrites()
  {
    return $this->writes;
  }
}
