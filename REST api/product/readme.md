Troubleshooting
================

To fix the error the Response content must be a string or object implementing __toString(), "boolean" given means there may be some characters in 
the database that some character that json can't encode.  To fix this enter in the model e.g.

```
protected $hidden = array(
        'password',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at'
	);
  ```
