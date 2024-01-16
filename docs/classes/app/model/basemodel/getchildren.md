
# BaseModel::getChildren 

### Usage

> ModelIterator BaseModel::getChildren(string $foreign_key, string $class_name, [ string $sort_by = 'id' ], [ string $sort_dir = 'asc' ], [ int $limit = '0' ], [ int $offset = '0' ])

### Description

> Get child records based on a foreign key constraint.

### Parameters

Parameter | Required | Type | Description
------------- |------------- |------------- |------------- 
foreign_key | Yes | string |
class_name | Yes | string |
sort_by | No | string |
sort_dir | No | string |
limit | No | int |
offset | No | int |

### Return
> ModelIterator 
### See Also

* [all()](all.md)
* [count()](count.md)
* [delete()](delete.md)
* [deleteMany()](deletemany.md)
* [insert()](insert.md)
* [insertFromForm()](insertfromform.md)
* [insertOrUpdate()](insertorupdate.md)
* [purge()](purge.md)
* [save()](save.md)
* [toArray()](toarray.md)
* [toFormattedArray()](toformattedarray.md)
* [update()](update.md)
* [where()](where.md)
* [whereFirst()](wherefirst.md)
* [whereId()](whereid.md)


