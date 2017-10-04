function build(input type,name,id,class,placeholder,optional attributes)//for create input types            

example: build("text","username","uname","form_control","Username","style='border:none'");

input type
        values
               text     : <input type="text"> 
               email    : <input type="email"> 
               number   : <input type="number">
               password : <input type="password">
               radio    : <input type="radio">
               checkbox : <input type="checkbox">
               textarea : <textarea></textarea>
               submit   : <button type="submit"></button> eg: build("submit","btn","btn","btn btn-success","","Save")

if no optional attributes place a pair of double quotes("")

function validate(field,array("validation rules")); //for validate a particular field with given validation rules

    field   : name of the input field
    array() :Array of validation parameters 
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
