<?php

namespace SrcLab\OnlineConsultant\Contracts;

interface OnlineConsultant
{
    /**
     * Проверка полученных данных в вебхуке, определение являются ли данные новым сообщением.
     *
     * @param array $data
     * @return bool
     */
    public function checkWebhookDataForNewMessage(array $data);

    /**
     * Проверка фильтра пользователей по id на сайте.
     *
     * @param array $only_user_ids
     * @param array $data
     * @return bool
     */
    public function checkEnabledUserIds(array $only_user_ids, array $data);

    /**
     * Отправка сообщения клиенту.
     *
     * @param string $client_id
     * @param string $message
     * @param string $operator
     * @return bool
     */
    public function sendMessage($client_id, $message, $operator = null);

    /**
     * Отправка сообщения с кнопками клиенту.
     *
     * @param string $client_id
     * @param array $button_names
     * @param string $operator
     * @return bool
     */
    public function sendButtonsMessage($client_id, array $button_names, $operator = null);

    /**
     * Получение диалога с клиентом за период.
     *
     * @param int $client_id
     * @param array $period
     * @return array
     */
    public function getDialogFromClientByPeriod($client_id, array $period = []);

    /**
     * Получение списка сообщений за период.
     *
     * @param array $period
     * @return array
     */
    public function getDialogsByPeriod(array $period);

    /**
     * Получение параметра из данных вебхука.
     *
     * @param string $param
     * @param array $data
     * @return mixed
     */
    public function getParamFromDataWebhook($param, array $data);

    /**
     * Получение параметров диалога.
     *
     * @param string $param
     * @param array $dialog
     * @return mixed
     */
    public function getParamFromDialog($param, array $dialog);

    /**
     * Получение даты и времени последнего сообщения клиента или оператора в диалоге.
     *
     * @param array $dialog
     * @return \Carbon\Carbon
     */
    public function getDateTimeLastMessage($dialog);

    /**
     * Поиск сообщений оператора.
     *
     * @param array $messages
     * @return array
     */
    public function findOperatorMessages(array $messages);

    /**
     * Поиск сообщений от клиента.
     *
     * @param array $messages
     * @return array
     */
    public function findClientMessages(array $messages);

    /**
     * Поиск ключа сообщения в массиве сообщений.
     *
     * @param string $select_message
     * @param array $messages
     * @return int|null
     */
    public function findMessageKey($select_message, array $messages);

    /**
     * Поиск сообщений оператора и группировка по дате отправку.
     *
     * @param array $dialogs
     * @return mixed
     */
    public function findOperatorMessagesAndGroupBySentAt(array $dialogs);

    /**
     * Получение списка ид операторов онлайн.
     *
     * @return array
     */
    public function getListOnlineOperatorsIds();

    /**
     * Перевод чата на оператора.
     *
     * @param array $dialog
     * @param mixed $to_operator
     * @return bool
     */
    public function redirectDialogToOperator(array $dialog, $to_operator);

    /**
     * Проверка наличия отдельного бота в мессенджере.
     *
     * @return bool
     */
    public function isBot();

    /**
     * Проверка наличия функции закрытия чата в мессенджере.
     *
     * @return bool
     */
    public function isCloseChatFunction();

    /**
     * Проверка находится ли диалог на боте.
     *
     * @param $dialog
     * @return bool
     */
    public function isDialogOnTheBot($dialog);

    /**
     * Закрытие чата.
     *
     * @param $client_id
     * @return bool
     */
    public function closeChat($client_id);

    /**
     * Проверка был ли клиент передан боту.
     *
     * @param array $dialog
     * @return bool
     */
    public function isClientRedirectedToBot($dialog);

    /**
     * Получение названия текущего консультанта.
     *
     * @return string
     */
    public function getOnlineConsultantName();
}