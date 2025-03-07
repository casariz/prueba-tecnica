import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { HistorialService } from '../../services/historial.service';

@Component({
  selector: 'app-historial',
  imports: [CommonModule],
  templateUrl: './historial.component.html',
  styleUrl: './historial.component.css'
})
export class HistorialComponent {

  // La lista de registros se inicializa como un arreglo vacío.
  historialUsuario: any[] = [];

  constructor(private historialService: HistorialService) { }

  ngOnInit(): void {
    this.loadHistorial();
  }

  // Carga el historial de conversiones
  loadHistorial(): void {
    this.historialService.getHistorial().subscribe(
      (data: any) => {
        this.historialUsuario = data;
      },
      error => {
        console.error('Error al cargar el historial:', error);
      }
    );
  }

  // Formatea la fecha en formato local
  formatDate(timestamp: string | Date): string {
    const date = new Date(timestamp);
    return date.toLocaleDateString();
  }

  // Formatea el monto en formato de moneda
  formatCurrency(amount: number, symbol: string): string {
    return `${symbol} ${amount}`;
  }
}