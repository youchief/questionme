/***
 *    ________                   
 *    \_____  \___  _____  _  __ 
 *      _(__  <\  \/  /\ \/ \/ / 
 *     /       \>    <  \     /  
 *    /______  /__/\_ \  \/\_/   
 *           \/      \/          
 *  
 *  a 3xw sàrl application, made by awallef ( https://github.com/awallef )
 *  copyright 3xw sàrl Switzerland
 */
(function(scope) {
    
    if (null == scope)
        scope = window;
    
    if (scope.attachmentAdd)
        return;
    
    /***
     *    _________                __                .__  .__                
     *    \_   ___ \  ____   _____/  |________  ____ |  | |  |   ___________ 
     *    /    \  \/ /  _ \ /    \   __\_  __ \/  _ \|  | |  | _/ __ \_  __ \
     *    \     \___(  <_> )   |  \  |  |  | \(  <_> )  |_|  |_\  ___/|  | \/
     *     \______  /\____/|___|  /__|  |__|   \____/|____/____/\___  >__|   
     *            \/            \/                                  \/       
     */
    var Process = {
        INIT                    : 'INIT',
        UPLOAD_MANY             : 'UPLOAD_MANY'
    };
    
    var Notification = {
        
        ADD_EVENT_LISTENERS     : 'ADD_EVENT_LISTENERS',
        
        LOAD_AJAX               : 'LOAD_AJAX',
        
        SHOW_MODAL              : 'SHOW_MODAL',
        HIDE_MODAL              : 'HIDE_MODAL',
        SET_MODAL_BOY           : 'SET_MODAL_BOY'
        
    };
    
    /* Create Animations
     *******************************************/
    function AddEventListeners( note )
    {
        better.AbstractCommand.call(this, note );
    };

    AddEventListeners.prototype = new better.AbstractCommand;
    AddEventListeners.prototype.constructor = AddEventListeners;
    
    AddEventListeners.prototype.execute = function( notification )
    { 
        this.facade.registerEventHandler( 'choose-many', $('#choose-many').get(0), 'click', {
            name: Notification.SHOW_MODAL, 
            body: null, 
            type: null
        });
        
        this.facade.registerEventHandler( 'upload-many', $('#upload-many').get(0), 'click', {
            name: Process.UPLOAD_MANY, 
            body: {
                urls: [ this.facade.getRessource('settings').controller_url + '/uploadmany' ],
                asBody: [ true ]
            }, 
            type: null
        });
        
        this.facade.registerEventHandler( 'add-embed', $('#add-embed').get(0), 'click', {
            name: Notification.SHOW_MODAL, 
            body: null, 
            type: null
        });
        
        this.nextCommand();
    };
    
    /* Create Animations
     *******************************************/
    function LoadAjax( note )
    {
        better.AbstractCommand.call(this, note );
    };

    LoadAjax.prototype = new better.AbstractCommand;
    LoadAjax.prototype.constructor = LoadAjax;
    
    LoadAjax.prototype.execute = function( notification )
    { 
        var url = notification.body.urls.shift();
        
        $.ajax({
            url: url,
            dataType: 'html',
            context: this
        })
        .fail( this.fail )
        .done(this.done);
        
    };
    
    LoadAjax.prototype.fail = function( )
    { 
        alert('Une erreur c\'est produite lors du chargement des données');
    };
    
    LoadAjax.prototype.done = function( data )
    { 
        var whichRessource = ( this.notification.body.asBody.shift() )? 'modal-body': 'loadingData';
        this.facade.setRessource( whichRessource, data );
        this.nextCommand();
    };
    
    /***
     *    ____   ____.__               
     *    \   \ /   /|__| ______  _  __
     *     \   Y   / |  |/ __ \ \/ \/ /
     *      \     /  |  \  ___/\     / 
     *       \___/   |__|\___  >\/\_/  
     *                       \/        
     */
    var Mediator = {
        MODAL               : 'MODAL'
    };
    
    /* Modal
     *******************************************/
    function Modal( mediatorName, viewComponent )
    {
        better.AbstractMediator.call(this, mediatorName, viewComponent );
    };

    Modal.prototype = new better.AbstractMediator;
    Modal.prototype.constructor = Modal;

    Modal.prototype.listNotificationInterests = function ()
    {
        return [
            Notification.SHOW_MODAL,
            Notification.HIDE_MODAl,
            Notification.SET_MODAL_BOY,
        ];
    };

    Modal.prototype.handleNotification = function (notification)
    {
        switch( notification.name )
        {
            case Notification.SHOW_MODAL:
                this.viewComponent.modal('show');
                break;
                
            case Notification.HIDE_MODAL:
                this.viewComponent.modal('hide');
                break;
            
            case Notification.SET_MODAL_BOY:
                $('#attachement-modal .modal-body').html( this.facade.getRessource('modal-body') );
                break;
        } 
        
    };
    
    /***
     *    ___________                         .___      
     *    \_   _____/____    ____ _____     __| _/____  
     *     |    __) \__  \ _/ ___\\__  \   / __ |/ __ \ 
     *     |     \   / __ \\  \___ / __ \_/ /_/ \  ___/ 
     *     \___  /  (____  /\___  >____  /\____ |\___  >
     *         \/        \/     \/     \/      \/    \/ 
     */
    function AttachmentAdd()
    {
        better.AbstractFacade.call(this, null);
    }
    
    AttachmentAdd.prototype = new better.AbstractFacade;
    AttachmentAdd.prototype.constructor = AttachmentAdd;
    
    AttachmentAdd.prototype.initRessources = function( configObject )
    {
       this.setRessource( 'settings', attachment_add_settings);
    };
    
    AttachmentAdd.prototype.initMediators = function(configObject)
    {
        this.registerMediator( new Modal( Mediator.MODAL, $('#attachement-modal') ) );
    };
    
    AttachmentAdd.prototype.initCommands = function(configObject)
    {
        this.registerCommand( Notification.ADD_EVENT_LISTENERS, AddEventListeners );
        this.registerCommand( Notification.LOAD_AJAX, LoadAjax );
    };
    
    AttachmentAdd.prototype.initProcesses = function(configObject)
    {
        this.registerProcess( Process.INIT, [
            Notification.ADD_EVENT_LISTENERS
        ]);
        
        this.registerProcess( Process.UPLOAD_MANY, [
            Notification.LOAD_AJAX,
            Notification.SET_MODAL_BOY,
            Notification.SHOW_MODAL
        ]);
    };
    
    
    AttachmentAdd.prototype.bootstrap = function()
    {
        this.goTo(  Process.INIT, {} );
        //alert( this.getRessource('settings').controller_url );
    };
    
    /***
     *    __________                   .___       
     *    \______   \ ____ _____     __| _/__.__. 
     *     |       _// __ \\__  \   / __ <   |  | 
     *     |    |   \  ___/ / __ \_/ /_/ |\___  | 
     *     |____|_  /\___  >____  /\____ |/ ____| 
     *            \/     \/     \/      \/\/      
     */
    ready = function(){
        scope.attachmentAdd = new AttachmentAdd();
        scope.attachmentAdd.init();
    };
    
    scope.onload = ready;
    
})( this );