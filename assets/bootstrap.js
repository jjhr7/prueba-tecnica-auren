import { startStimulusApp } from '@symfony/stimulus-bridge';

startStimulusApp(require.context('./controllers', true, /\.(j|t)sx?$/));

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
