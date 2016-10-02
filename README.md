## Shopware DQL Query API extension

This plugin provides a "query" api resource which allows GET requests.

A parameter "q" needs to be present, containing a valid doctrine DQL query.

State: experimental

## Example

Find a customer by e-mail address:

    SELECT u FROM \Shopware\Models\Customer\Customer u WHERE u.email = 'example@example.com'

GET URL:

    /api/query/?q=SELECT+u+FROM+%5CShopware%5CModels%5CCustomer%5CCustomer+u+WHERE+u.email+=+%27example@example.com%27

Result:

    {  
      "total":1,
      "success":true,
      "data":[  
        {  
          "id":3,
          "groupKey":"GRP1",
          "email":"example@example.com",
          ...
          "newsletter":0
        }
      ]
    }


DQL Joins are also possible.

## Installation

Download zip file https://github.com/kwmiebach/shopware-api-query/raw/master/KwmiebachExtendApiDql-4513d40.zip and upload manually as a 'community plugin' from within your shop backend.

## Packaging

To create the zip file from sources make sure the ./Core directory is in the root of the zip file.
