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
