class Process:
    def __init__(self, id, arrival_time, burst_time):
        self.id = id
        self.arrival_time = arrival_time
        self.burst_time = burst_time
        self.completion_time = 0
        self.waiting_time = 0
        self.turnaround_time = 0

def find_fcfs_scheduling(processes):
    processes.sort(key=lambda x: x.arrival_time)
    
    current_time = 0
    for process in processes:
        if current_time < process.arrival_time:
            current_time = process.arrival_time
        current_time += process.burst_time
        process.completion_time = current_time
        process.turnaround_time = process.completion_time - process.arrival_time
        process.waiting_time = process.turnaround_time - process.burst_time

def display_process_info(processes):
    print("ID Proses\tWaktu Kedatangan\tDurasi Proses\tWaktu Penyelesaian\tWaktu Tunggu\tWaktu Putaran")
    for process in processes:
        print(f"{process.id}\t\t{process.arrival_time}\t\t{process.burst_time}\t\t{process.completion_time}\t\t{process.waiting_time}\t\t{process.turnaround_time}")

if __name__ == "__main__":
    processes = [
        Process(1, 0, 4),
        Process(2, 1, 2),
        Process(3, 2, 1),
        Process(4, 3, 3)
    ]

    find_fcfs_scheduling(processes)
    display_process_info(processes)
