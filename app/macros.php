<?php

Form::macro("columnIndex", function($options)
{
	$markup = '';
	if (!empty($options["label"]))
    {
		$markup .= '<th class="cell ">';
		$markup .= $options["label"];
		$markup .= '</th>';
        
    }
	if (!empty($options["labelxs"]))
    {
		$markup .= '<td class="cell ctitle visible-xs hidden-md">';
		$markup .= $options["labelxs"];
		$markup .= '</td>';        
    }
	$contentsize = 2;
	if (!empty($options["size"]))
	{
		$contentsize = $options["size"]; 
	}
	if (!empty($options["content"]))
    {
		$markup .= '<td class="cell col-sm-'.$contentsize.'" >';//data-title="Description"
		$markup .= $options["content"];
		$markup .= '</td>';        
    }
	//Colocar opcion de checkbox
	return $markup;
});

Form::macro("columnAdd", function($options)
{
	$markup = "";
    $type = "";

    if (!empty($options["type"]))
    {
        $type = $options["type"];
    }
	$name = '';
    if (!empty($options["name"]))
    {
        $name = $options["name"];
    }
	$id = '';
    if (!empty($options["id"]))
    {
        $id = $options["id"];

    }
    $label = "";
    if (!empty($options["label"]))
    {
        $label = $options["label"];
    }
	$labelxs = '';
	if (!empty($options["labelxs"]))
    {
        $labelxs = $options["labelxs"];
    }
    $value = Input::old($name);
    if (!empty($options["value"]))
    {
        $value = Input::old($name, $options["value"]);
    }
	if (!empty($options["routes"]))
    {
        $routes = $options["routes"];
    }
	
    $placeholder = "";
    if (!empty($options["placeholder"]))
    {
        $placeholder = $options["placeholder"];
    }
	
    $class = "";
    if (!empty($options["class"]))
    {
        $class = " " . $options["class"];
    }
    $parameters = [
        "class"       	=> 	"form-control" . $class,
        "placeholder" =>	$placeholder,
		"id"				=>	$id
    ];
    $error = "";
    if (!empty($options["form"]))
    {		
        $error = $options["form"]->getError($name);
	}
	$fail = "";
	$failb = false;
    if (!empty($options["fail"]))
    {		

		if (count($options["fail"]->get($name))>0){
			
			//$this->errors->get("id_bodega_txt_0")))
			$fail = $options["fail"]->get($name);
			$failb = true;
			//if(strcmp($name,"id_bodega_txt_0")==0){
				
			//}
		
		}
	}

    /*if ($type !== "hidden")
    {
        $markup .= "<div class='form-group";
        
        $markup .= "'>";
    }*/
	$contentsize = 2;
	if (!empty($options["size"]))
	{
		$contentsize = $options["size"]; 
	}

	//die(var_dump($markup." ".$type." ".$label));
    switch ($type)
    {
  
		case "label":
        {
			$markup .= '<th class="cell ">';
			$markup .= '<div ';
			//if($failb){
			//die($name." ".var_dump($fail[0]));}
			$markup .= ($failb ? 'class=" has-error"' : "");
			$markup .= '><label class="control-label">'.$label.'</label></div>';
			$markup .= '</th>';
			break;
		}
		case "labelxs":
        {
			$markup .= '<td class="cell ctitle visible-xs hidden-md">';
			$markup .= $labelxs;
			$markup .= '</td>';
			break;
		}
        case "text":
        {
        	$markup .= '<td class="cell col-sm-'.$contentsize;
			$markup .= ($failb ? " has-error" : "");
			$markup .= '">';
			$markup .= Form::text($name, $value, $parameters);
			$markup .= '</td>';        
            break;
        }

        case "password":
        {
            $markup .= Form::label($name, $label, [
                "class" => "control-label"
            ]);

            $markup .= Form::password($name, $parameters);

            break;
        }

        case "checkbox":
        {
            $markup .= '<td class="cell col-sm-'.$contentsize.'">';
            $markup .= Form::checkbox($name, true, (boolean) $value, $parameters);
            $markup .= '</td>'; 
            break;
        }

        case "hidden":
        {
            $markup .= Form::hidden($name, $value);
            break;
        }
        case "select":
        {
			$markup .= '<td class="cell col-sm-'.$contentsize;
			$markup .= ($failb ? " has-error" : "");
			$markup .= '">';
            $markup .= Form::select($name,$routes,$value, $parameters);
			$markup .= '</td>';     			
            break;
        }
		case "date":
        {
            $markup .= Form::input('date', $name, null, $parameters);
            break;
        }
	}

    if ($failb)
    {
        $markup .= "<span class='help-block'>";
        $markup .= $failb;
        $markup .= "</span>";
    }

    if ($type !== "hidden")
    {
        $markup .= "</div>";
    }
	
	return $markup;
});
Form::macro("columnEdit", function($options)
{
	$markup = "";
    $type = "";

    if (!empty($options["type"]))
    {
        $type = $options["type"];
    }
	$name = '';
    if (!empty($options["name"]))
    {
        $name = $options["name"];
    }
    $label = "";
    if (!empty($options["label"]))
    {
        $label = $options["label"];
    }
	if (!empty($options["routes"]))
    {
        $routes = $options["routes"];
    }
	$labelxs = '';
	if (!empty($options["labelxs"]))
    {
        $labelxs = $options["labelxs"];
    }
    $value = Input::old($name);
    if (!empty($options["value"]))
    {
        $value = Input::old($name, $options["value"]);
    }
    $placeholder = "";
    if (!empty($options["placeholder"]))
    {
        $placeholder = $options["placeholder"];
    }
	
    $class = "";
    if (!empty($options["class"]))
    {
        $class = " " . $options["class"];
    }
    $parameters = [
        "class"       => "form-control" . $class,
        "placeholder" => $placeholder
    ];
    $error = "";
    if (!empty($options["form"]))
    {		
        $error = $options["form"]->getError($name);
	}

    /*if ($type !== "hidden")
    {
        $markup .= "<div class='form-group";
        
        $markup .= "'>";
    }*/
	$contentsize = 2;
	if (!empty($options["size"]))
	{
		$contentsize = $options["size"]; 
	}

	//die(var_dump($markup." ".$type." ".$label));
    switch ($type)
    {
  
		case "label":
        {
			$markup .= '<th class="cell ">';
			$markup .= '<div ';
			$markup .= ($error ? 'class=" has-error"' : "");
			$markup .= '><label class="control-label">'.$label.'</label></div>';
			$markup .= '</th>';
			break;
		}
		case "labelxs":
        {
			$markup .= '<td class="cell ctitle visible-xs hidden-md">';
			$markup .= $labelxs;
			$markup .= '</td>';
			break;
		}
        case "text":
        {
        	$markup .= '<td class="cell col-sm-'.$contentsize;
			$markup .= ($error ? " has-error" : "");
			$markup .= '">';
			$markup .= Form::text($name, $value, $parameters);
			$markup .= '</td>';        
            break;
        }

        case "password":
        {
            $markup .= Form::label($name, $label, [
                "class" => "control-label"
            ]);

            $markup .= Form::password($name, $parameters);

            break;
        }

        case "checkbox":
        {
            $markup .= '<td class="cell col-sm-'.$contentsize.'">';
            $markup .= Form::checkbox($name, true, (boolean) $value);
            $markup .= '</td>'; 
            break;
        }

        case "hidden":
        {
            $markup .= Form::hidden($name, $value);
            break;
        }
        case "select":
        {
			$markup .= '<td class="cell col-sm-'.$contentsize;
			$markup .= ($error ? " has-error" : "");
			$markup .= '">';
            $markup .= Form::select($name,$routes,$value);
			$markup .= '</td>';     			
            break;
        }
	}

    if ($error)
    {
        $markup .= "<span class='help-block'>";
        $markup .= $error;
        $markup .= "</span>";
    }

    if ($type !== "hidden")
    {
        $markup .= "</div>";
    }
	
	return $markup;
});
Form::macro("fieldCreate", function($options)
{
    $markup = "";

    $type = "text";

    if (!empty($options["type"]))
    {
        $type = $options["type"];
    }

	if (!empty($options["routes"]))
    {
        $routes = $options["routes"];
    }
	
    if (empty($options["name"]))
    {
        return;
    }

    $name = $options["name"];

    $label = "";

    if (!empty($options["label"]))
    {
        $label = $options["label"];
    }

    $value = Input::old($name);

    if (!empty($options["value"]))
    {
        $value = Input::old($name, $options["value"]);
    }

    $placeholder = "";

    if (!empty($options["placeholder"]))
    {
        $placeholder = $options["placeholder"];
    }

    $class = "";

    if (!empty($options["class"]))
    {
        $class = " " . $options["class"];
    }

    $parameters = [
        "class"       => "form-control" . $class,
        "placeholder" => $placeholder
    ];

    $error = "";

    if (!empty($options["form"]))
    {
        $error = $options["form"]->getError($name);
    }

    if ($type !== "hidden")
    {
        $markup .= "<div class='form-group";
        $markup .= ($error ? " has-error" : "");
        $markup .= "'>";
    }

    switch ($type)
    {
        case "text":
        {
            $markup .= Form::label($name, $label, [
                "class" => "control-label"
            ]);

            $markup .= Form::text($name, $value, $parameters);

            break;
        }

        case "password":
        {
            $markup .= Form::label($name, $label, [
                "class" => "control-label"
            ]);

            $markup .= Form::password($name, $parameters);

            break;
        }

        case "checkbox":
        {
            $markup .= "<div class='checkbox'>";
            $markup .= "<label>";
            $markup .= Form::checkbox($name, true, (boolean) $value);
            $markup .= " " . $label;
            $markup .= "</label>";
            $markup .= "</div>";
            break;
        }

        case "hidden":
        {
            $markup .= Form::hidden($name, $value);
            break;
        }
        case "select":
        {
            $markup .= Form::select($name,$routes,$value);
            break;
        }
		case "date":
        {
            $markup .= Form::input('date', $name, null, $value);
            break;
        }
	}

    if ($error)
    {
        $markup .= "<span class='help-block'>";
        $markup .= $error;
        $markup .= "</span>";
    }

    if ($type !== "hidden")
    {
        $markup .= "</div>";
    }

    return $markup;
});
