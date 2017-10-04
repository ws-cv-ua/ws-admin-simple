/*!
 * FileInput Russian Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 * @author CyanoFresh <cyanofresh@gmail.com>
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";
    if($.fn.fileinputLocales != undefined) {
        $.fn.fileinputLocales['ru'] = {
            fileSingle: 'файл',
            filePlural: 'файлы',
            browseLabel: 'Выбрать &hellip;',
            removeLabel: 'Удалить',
            removeTitle: 'Очистить выбранные файлы',
            cancelLabel: 'Отмена',
            cancelTitle: 'Отменить текущую загрузку',
            uploadLabel: 'Загрузить',
            uploadTitle: 'Загрузить выбранные файлы',
            msgNo: 'нет',
            msgNoFilesSelected: '',
            msgCancelled: 'Отменено',
            msgZoomModalHeading: 'Подробное превью',
            msgFileRequired: 'You must select a file to upload.',
            msgSizeTooSmall: 'Файл "{name}" (<b>{size} KB</b>) имеет слишком маленький размер и должен бути больше <b>{minSize} KB</b>.',
            msgSizeTooLarge: 'Файл "{name}" (<b>{size} KB</b>) превышает максимальный размер <b>{maxSize} KB</b>.',
            msgFilesTooLess: 'Вы должны выбрать как минимум <b>{n}</b> {files} для загрузки.',
            msgFilesTooMany: 'Количество выбранных файлов <b>({n})</b> превышает максимально допустимое количество <b>{m}</b>.',
            msgFileNotFound: 'Файл "{name}" не найден!',
            msgFileSecured: 'Ограничения безопасности запрещают читать файл "{name}".',
            msgFileNotReadable: 'Файл "{name}" невозможно прочитать.',
            msgFilePreviewAborted: 'Предпросмотр отменен для файла "{name}".',
            msgFilePreviewError: 'Произошла ошибка при чтении файла "{name}".',
            msgInvalidFileName: 'Неверные или неподдерживаемые символы в названии файла "{name}".',
            msgInvalidFileType: 'Запрещенный тип файла для "{name}". Только "{types}" разрешены.',
            msgInvalidFileExtension: 'Запрещенное расширение для файла "{name}". Только "{extensions}" разрешены.',
            msgFileTypes: {
                'image': 'image',
                'html': 'HTML',
                'text': 'text',
                'video': 'video',
                'audio': 'audio',
                'flash': 'flash',
                'pdf': 'PDF',
                'object': 'object'
            },
            msgUploadAborted: 'Выгрузка файла прервана',
            msgUploadThreshold: 'Обработка...',
            msgUploadBegin: 'Инициализация...',
            msgUploadEnd: 'Готово',
            msgUploadEmpty: 'Недопустимые данные для загрузки',
            msgUploadError: 'Error',
            msgValidationError: 'Ошибка проверки',
            msgLoading: 'Загрузка файла {index} из {files} &hellip;',
            msgProgress: 'Загрузка файла {index} из {files} - {name} - {percent}% завершено.',
            msgSelected: 'Выбрано файлов: {n}',
            msgFoldersNotAllowed: 'Разрешено перетаскивание только файлов! Пропущено {n} папок.',
            msgImageWidthSmall: 'Ширина зображення {name} повинна бути не меньше {size} px.',
            msgImageHeightSmall: 'Высота зображення {name} повинна бути не меньше {size} px.',
            msgImageWidthLarge: 'Ширина зображення "{name}" не может перевищувати {size} px.',
            msgImageHeightLarge: 'Высота зображення "{name}" не может перевищувати {size} px.',
            msgImageResizeError: 'Не удалось получить размеры зображення, чтобы изменить размер.',
            msgImageResizeException: 'Ошибка при изменении размера зображення.<pre>{errors}</pre>',
            msgAjaxError: 'Произошла ошибка при выполнении операции {operation}. Повторите попытку позже!',
            msgAjaxProgressError: 'Не удалось выполнить {operation}',
            ajaxOperations: {
                deleteThumb: 'удалить файл',
                uploadThumb: 'загрузить файл',
                uploadBatch: 'загрузить пакет файлов',
                uploadExtra: 'загрузка данных с формы'
            },
            dropZoneTitle: 'Перетащите файлы сюда &hellip;',
            dropZoneClickTitle: '<br>(Или щёлкните, чтобы выбрать {files})',
            fileActionSettings: {
                removeTitle: 'Удалить файл',
                uploadTitle: 'Загрузить файл',
                uploadRetryTitle: 'Retry upload',
                zoomTitle: 'Переглянути детали',
                dragTitle: 'Переместить / Изменить порядок',
                indicatorNewTitle: 'Еще не загружен',
                indicatorSuccessTitle: 'Загружен',
                indicatorErrorTitle: 'Ошибка загрузки',
                indicatorLoadingTitle: 'Загрузка ...'
            },
            previewZoomButtonTitles: {
                prev: 'Переглянути предыдущий файл',
                next: 'Переглянути следующий файл',
                toggleheader: 'Переключить заголовок',
                fullscreen: 'Переключить полноэкранный режим',
                borderless: 'Переключить режим без полей',
                close: 'Закрыть подробный предпросмотр'
            }
        };
        $.fn.fileinputLocales['uk'] = {
            fileSingle: 'файл',
            filePlural: 'файли',
            browseLabel: 'Вибрати &hellip;',
            removeLabel: 'Видалити',
            removeTitle: 'Очистити вибрані файли',
            cancelLabel: 'Відмінити',
            cancelTitle: 'Відмінити загрузку',
            uploadLabel: 'Загрузити',
            uploadTitle: 'Загрузити вибрані файли',
            msgNo: 'ні',
            msgNoFilesSelected: '',
            msgCancelled: 'Відмінено',
            msgZoomModalHeading: 'Детальне превью',
            msgFileRequired: 'Виберіть файл для загрузки.',
            msgSizeTooSmall: 'Файл "{name}" (<b>{size} KB</b>) має дуже маленький розмір і повинен бути більшим <b>{minSize} KB</b>.',
            msgSizeTooLarge: 'Файл "{name}" (<b>{size} KB</b>) перевищує максимальный розмір <b>{maxSize} KB</b>.',
            msgFilesTooLess: 'Ви повинні вибрати як мінімум <b>{n}</b> {files} для загрузки.',
            msgFilesTooMany: 'Кількість вибраних файлів <b>({n})</b> перевищує максимально допустиму кількість <b>{m}</b>.',
            msgFileNotFound: 'Файл "{name}" не найден!',
            msgFileSecured: 'Обмеження безпеки забороняють читати файл "{name}".',
            msgFileNotReadable: 'Файл "{name}" неможливо прочитати.',
            msgFilePreviewAborted: 'Попередній перегляд відключений для файла "{name}".',
            msgFilePreviewError: 'Виникла помилка при читанні файла "{name}".',
            msgInvalidFileName: 'Невірні або непідтримаючі символи в назві файла "{name}".',
            msgInvalidFileType: 'Заборонений тип файла для "{name}". Тілько "{types}" дозволені.',
            msgInvalidFileExtension: 'Заборонине розширеня для файла "{name}". Тільки "{extensions}" дозволені.',
            msgFileTypes: {
                'image': 'image',
                'html': 'HTML',
                'text': 'text',
                'video': 'video',
                'audio': 'audio',
                'flash': 'flash',
                'pdf': 'PDF',
                'object': 'object'
            },
            msgUploadAborted: 'Вигрузка файла перервана',
            msgUploadThreshold: 'Обробка...',
            msgUploadBegin: 'Ініціалізація...',
            msgUploadEnd: 'Готово',
            msgUploadEmpty: 'Недопустимі дані для загрузки',
            msgUploadError: 'Помилка',
            msgValidationError: 'Помилка провірки',
            msgLoading: 'Загрузка файла {index} з {files} &hellip;',
            msgProgress: 'Загрузка файла {index} з {files} - {name} - {percent}% завершено.',
            msgSelected: 'Вибрано файлів: {n}',
            msgFoldersNotAllowed: 'Дозволено перетягування тільки файлів! Пропущено {n} папок.',
            msgImageWidthSmall: 'Ширина зображення {name} повинна бути не меньше {size} px.',
            msgImageHeightSmall: 'Высота зображення {name} повинна бути не меньше {size} px.',
            msgImageWidthLarge: 'Ширина зображення "{name}" не може перевищувати {size} px.',
            msgImageHeightLarge: 'Высота зображення "{name}" не може перевищувати {size} px.',
            msgImageResizeError: 'Не получилось отримати розмір зображення, щоб змінити розмір.',
            msgImageResizeException: 'Помилка при зміні розміра зображення.<pre>{errors}</pre>',
            msgAjaxError: 'Виникла помилка при виконані операцій {operation}. Повторіть пізніше!',
            msgAjaxProgressError: 'Не получилось виконати {operation}',
            ajaxOperations: {
                deleteThumb: 'видалити файл',
                uploadThumb: 'загрузити файл',
                uploadBatch: 'загрузити пакет файлів',
                uploadExtra: 'загрузка даних з форми'
            },
            dropZoneTitle: 'Перетягніть файли сюди &hellip;',
            dropZoneClickTitle: '<br>(Або клікніть, щоб вибрати {files})',
            fileActionSettings: {
                removeTitle: 'Видалити файл',
                uploadTitle: 'Загрузити файл',
                uploadRetryTitle: 'Повторити завантаження',
                zoomTitle: 'переглянути деталі',
                dragTitle: 'Перемістити / Змінити порядок',
                indicatorNewTitle: 'Ще не загружен',
                indicatorSuccessTitle: 'Загружен',
                indicatorErrorTitle: 'Помилка загрузки',
                indicatorLoadingTitle: 'Загрузка ...'
            },
            previewZoomButtonTitles: {
                prev: 'Переглянути попередній файл',
                next: 'Переглянути наступний файл',
                toggleheader: 'Переключити заголовок',
                fullscreen: 'Переключити повноекранний режим',
                borderless: 'Переключити режим без полів',
                close: 'Закрити детальний перегляд'
            }
        };
    }
})(window.jQuery);
