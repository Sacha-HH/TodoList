# Dictionnaire de données

## Tasks

|Field|Types|Spécificity|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|Task's ID|
|title|VARCHAR(64)|NOT NULL|Title's task|
|completion|INT|NULL|Completion's task|
|category_id|INT|NOT NULL UNSIGNED|Category's ID of the task|
|status|tinyint(1)|NOT NULL|status du produit (1= Todo, 2= completed)|
|created_at|TIMESTAMP|NOT NULL DEFAULT CURRENT_TIMESTAMP|Date of creation|
|updated_at|TIMESTAMP|NULL|Date of update|

## CATEGORIES

|Field|Types|Spécificity|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|Task's ID|
|name|VARCHAR(64)|NOT NULL|Title's task|
|status|tinyint(1)|NOT NULL|status du produit (1= Assigned, 2= Not assigned)|
|created_at|TIMESTAMP|NOT NULL DEFAULT CURRENT_TIMESTAMP|Date of creation|
|updated_at|TIMESTAMP|NULL|Date of update|



