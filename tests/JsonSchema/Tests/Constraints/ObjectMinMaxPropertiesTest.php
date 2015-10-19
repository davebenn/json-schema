<?php

/*
 * This file is part of the JsonSchema package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JsonSchema\Tests\Constraints;

class ObjectMinMaxPropertiesTest extends BaseTestCase
{
    public function getInvalidTests()
    {
		return array(

			array( '{
						"lease_expiry": { "years_remaining" : 1, "expiry_date" : "abcdef" }
					}',
				'{
				"type":"object",
						"properties":{
						"lease_expiry" : {
							"type" : "object",
							 "minProperties" : 1,
							 "maxProperties" : 1,
							 "additionalProperties" : false,
							 "properties" : {
								"expiry_date" : {
									"type" : "string"
								},
								"years_remaining" : {
									"type" : "integer"
								}
							 }
						  }
					  }
				}'
			)


		);
    }

    public function getValidTests()
    {

		$schema =
			'{
						"type":"object",
						"properties":{
							"lease_expiry" : {
								"type" : "object",
								 "minProperties" : 1,
								 "maxProperties" : 1,
								 "additionalProperties" : false,
								 "properties" : {
									"expiry_date" : {
										"type" : "string"
									},
									"years_remaining" : {
										"type" : "integer"
									}
								 }
							  }
						}
					  }';

        return array(

			array( '{
						"lease_expiry" : { "expiry_date" : "test string" }
					}',
					$schema
					),

			array( '{
						"lease_expiry" : { "years_remaining" : 18 }
					}',
					$schema
					),

			array( '{
						"some_object" : { "property_1": "a string" }
					}',
					$schema
					),



			);
    }
}



