$('.editor')
            .trumbowyg()
            .on('tbwinit tbwfocus tbwblur tbwchange tbwresize tbwpaste tbwopenfullscreen tbwclosefullscreen tbwclose', function(e){
                console.log(e.type);
            });