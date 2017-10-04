A PHP plugin to validate all form fields using the bootstrap validator.

It uses function validate(field,array("validation rules")); //for validate a particular field with given validation rules

    field   : Name of the input field
    array() : Array of validation parameters 
        array values
                "required" - use if it is a required field
                "min"=>"minium length" - to set minium length
                "max"=>"maxium length" - to set minium length
                "email" - use if it is email field
                "different"=>"different_field different_field_name"
                "identical"=>"identical_field identical_field_name"
                "remote"=>"remotelocation"
                "regexp"=>"type of field"
                        type of fields are : name,age address,pin,phone etc

example: validate("password",array("required","label"=>"password","regexp"=>"name"));

Only work if bootstrap validater is included in the page
