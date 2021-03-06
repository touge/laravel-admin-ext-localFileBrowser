<?php

namespace Touge\LocalFileBrowser;

use Encore\Admin\Form\Field;
use Encore\Admin\Media\MediaManager;

class LocalFileBrowserField extends Field
{
    public $view = 'localFileBrowser::view_files';

    protected $media = null;
    protected $variables = null;
    protected $path = '/';
    public function getMedia($path = '/')
    {
        $this->media = new MediaManager($path);
        $this->variables = [
            'list'=>$this->media->ls(),
            'baseURL'=>config('filesystems.disks'.config('admin.extensions.media-manager.disk').'url'),
            'path'=>$this->path,
        ];
    }
    public function path($path)
    {
        $this->path = $path;

        return $this;
    }
    public function render()
    {
        $this->getMedia($this->path);
        return parent::render();
    }
}