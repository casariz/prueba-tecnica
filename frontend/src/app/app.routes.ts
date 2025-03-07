import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { ResultsComponent } from './components/results/results.component';
import { HistorialComponent } from './components/historial/historial.component';

export const routes: Routes = [
    {path: '', component:HomeComponent, pathMatch: 'full'},
    {path: 'results', component: ResultsComponent, pathMatch: 'full'},
    {path: 'history', component: HistorialComponent, pathMatch: 'full'}
];
