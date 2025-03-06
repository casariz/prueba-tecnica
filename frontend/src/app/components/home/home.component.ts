import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-home',
  imports: [FormsModule, CommonModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {
  selectedCity: string = 'Selecciona una ciudad';
  cities: string[] = ['Londres', 'New York', 'Paris', 'Tokyo', 'Madrid'];
  budget: number | null = null;

  selectCity(city: string): void {
    this.selectedCity = city;
  }

  planTrip(): void {
    console.log('Planificando viaje a:', this.selectedCity, 'con presupuesto:', this.budget);
  }
}
