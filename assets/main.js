 function getId(obj) {
        var id = (obj.id);
         $.ajax({
            type: 'post',
            url: '/main/index',//адрес обработчика
            data: {id:id},
            success: function (mess) {// в mess будет ответ с сервера
                 console.log(mess);
            }
          });
       }

