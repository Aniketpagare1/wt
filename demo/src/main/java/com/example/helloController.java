package com.example;
import org.springframework.web.bind.annotation.RestController;

import org.springframework.web.bind.annotation.GetMapping;






@RestController
public class helloController {

    @GetMapping("/")
    public String hello(){
        return "hello World";

    }

    
}
