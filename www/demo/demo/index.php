<?php


// echo 123/0;

// phpinfo();
// exit();

tideways_xhprof_enable(TIDEWAYS_XHPROF_FLAGS_MEMORY | TIDEWAYS_XHPROF_FLAGS_CPU);


class classA {

    public function getuniqid() {
        
        for ($i=0; $i<10; $i++) {
            uniqid();
        }
        
    }
}

//phpinfo();

echo "1";


function getuniqid() {
    for ($i=0; $i<10; $i++) {
        uniqid();
    }
}

getuniqid();

uniqid();

$a = new classA();

$a->getuniqid();


// var_dump( sys_get_temp_dir());

// var_dump(serialize(tideways_xhprof_disable()));

file_put_contents(
    sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid() . '.myapplication.xhprof',
    serialize(tideways_xhprof_disable())
);