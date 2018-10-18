<?php
namespace Core;

class TemplateEngine{
    public function regex($file){
        //  recupere le contenu du fichier avec un file get contents
        $file = preg_replace("{{(.*)}}","< ?= htmlentities $1 ?>",$file);
        $file = preg_replace("@if(.*)", "<?php if $1 :?>",$file);
        $file = preg_replace("@elseif(.*)","<?php elseif $1: ?>", $file);
        $file = preg_replace("@else","<?php else: ?>",$file);
        $file = preg_replace("@endif","<?php endif; ?>",$file);
        $file = preg_replace("@foreach(.*)","< ?php foreach $1: ?>",$file);
        $file = preg_replace("@endforeach","<?php endforeach; ?>",$file);
        $file = preg_replace("@isset(.*)","<?php if (isset$1): ?>",$file);
        $file = preg_replace("@endisset","<?php endif; ?>",$file);
        $file = preg_replace("@empty(.*)","<?php if (empty$1): ?>",$file);
        $file = preg_replace("@endempty","<?php endif; ?>",$file);

        return $file;
            }
}
