<?php

/**
 * Class to manage local camera
 *
 * @author spozoga
 */
class Cam {

    protected $_STREAM_PARAMS_DEFAULT = array(
        'width' => 640,
        'height' => 480,
        'timelapse' => 0,
        'timeout' => 1000000,
    );

    function takePicture($path) {
        return shell_exec("raspistill -o $path");
    }

    function startStream($path, $params = NULL) {
        $params = array_merge($this->_STREAM_PARAMS_DEFAULT, (array) $params);
        $this->stopStream();
        $command = "raspistill -w {$params['width']} -h {$params['height']} -vf -tl {$params['timelapse']} -t {$params['timeout']} -o $path &";
        //echo $command;
        $this->psExec($command);
        if (APP_MODE == 'development') {
            $params['command'] = $command;
        }
        return $params;
    }

    function stopStream() {
        shell_exec("killall raspistill");
        return array();
    }

    /**
     * @author Micheal Mouner
     * @param String $commandJob
     * @return Integer $pid
     */
    public function psExec($commandJob) {
        /* $command = $commandJob . ' > /dev/null 2>&1 & echo $!';
          exec($command, $op);
          $pid = (int) $op[0];
          if ($pid != "")
          return $pid;
          return false; */
        $command = "({$commandJob}) > /dev/null &";
        exec($command);
    }

}
